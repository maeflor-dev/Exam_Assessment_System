<?php require_once "../app/views/layouts/header.php"; ?>

<div id="warning" class="anti-cheat-warning">
    ⚠️ WARNING: Do not switch tabs! (<span id="switchCount">0</span>/3)
    Exam will auto-submit after 3 violations!
</div>

<style>
.anti-cheat-warning {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background: #ff9800;
    color: white;
    text-align: center;
    padding: 10px;
    display: none;
    z-index: 9999;
    font-weight: bold;
}
</style>

<div class="card">
    <div class="card-header" style="background: #e74c3c; color: white;">
        <div class="d-flex justify-content-between">
            <span><?= htmlspecialchars($exam['title']) ?></span>
            <span>Time Remaining: <span id="timer" class="badge bg-light text-dark">00:00</span></span>
        </div>
    </div>
    <div class="card-body">
        <div class="progress mb-3">
            <div class="progress-bar" id="progressBar" style="width: 0%"></div>
        </div>
        
        <form method="POST" action="<?= BASE_URL ?>/public/index.php?url=exam/submit" id="examForm">
            <input type="hidden" name="exam_id" value="<?= $exam['id'] ?>">
            <input type="hidden" name="tab_switches" id="tabSwitches" value="0">
            <input type="hidden" name="copy_attempts" id="copyAttempts" value="0">
            <input type="hidden" name="rightclick_attempts" id="rightclickAttempts" value="0">
            <input type="hidden" name="screenshot_attempts" id="screenshotAttempts" value="0">
            
            <?php foreach($questions as $index => $question): ?>
                <div class="border rounded p-3 mb-3">
                    <h6>Question <?= $index + 1 ?>: <?= htmlspecialchars($question['question']) ?></h6>
                    <?php $options = json_decode($question['options'], true); ?>
                    <?php foreach($options as $optIndex => $option): ?>
                        <div class="form-check">
                            <input type="radio" 
                                   name="answers[<?= $question['id'] ?>]" 
                                   value="<?= $optIndex ?>" 
                                   class="form-check-input"
                                   id="q<?= $question['id'] ?>_<?= $optIndex ?>"
                                   onchange="updateProgress()"
                                   required>
                            <label class="form-check-label" for="q<?= $question['id'] ?>_<?= $optIndex ?>">
                                <?= chr(65 + $optIndex) ?>. <?= htmlspecialchars($option) ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
            
            <div class="d-flex justify-content-between gap-3 mt-4">
                <button type="button" class="btn btn-warning" onclick="confirmReset()">
                    <i class="fas fa-sync-alt"></i> Reset Answers
                </button>
                <button type="submit" class="btn btn-success btn-lg" id="submitBtn">
                    <i class="fas fa-check-circle"></i> Submit Exam
                </button>
            </div>
        </form>
    </div>
</div>

<script>
let tabSwitchCount = 0;
let copyAttemptCount = 0;
let rightclickCount = 0;
let screenshotAttempts = 0;
let timeLimit = <?= $exam['time_limit'] ?> * 60;
let timerInterval;
let examSubmitted = false;
let totalQuestions = <?= count($questions) ?>;
let isSubmitting = false;  // ADD THIS LINE - tracks if form is being submitted

// ADD THIS - Mark as submitting when form is submitted
document.getElementById('examForm').addEventListener('submit', function() {
    isSubmitting = true;
});

function updateProgress() {
    let answered = 0;
    <?php foreach($questions as $question): ?>
        if (document.querySelector('input[name="answers[<?= $question['id'] ?>]"]:checked')) {
            answered++;
        }
    <?php endforeach; ?>
    
    let percentage = (answered / totalQuestions) * 100;
    document.getElementById('progressBar').style.width = percentage + '%';
}

function showWarning(message, count, maxCount = 3) {
    const warningDiv = document.getElementById('warning');
    warningDiv.innerHTML = `⚠️ ${message} (${count}/${maxCount})`;
    warningDiv.style.display = 'block';
    
    setTimeout(() => {
        if (!examSubmitted) {
            warningDiv.style.display = 'none';
        }
    }, 3000);
    
    if (count >= maxCount) {
        warningDiv.style.background = '#e74c3c';
        warningDiv.innerHTML = `⚠️ FINAL WARNING! Auto-submitting exam...`;
        setTimeout(() => {
            submitExam();
        }, 2000);
    }
}

function submitExam() {
    if (!examSubmitted) {
        examSubmitted = true;
        isSubmitting = true;  // Mark as submitting
        const submitBtn = document.getElementById('submitBtn');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
        submitBtn.disabled = true;
        document.getElementById('examForm').submit();
    }
}

function startTimer() {
    timerInterval = setInterval(() => {
        if (timeLimit <= 0) {
            clearInterval(timerInterval);
            alert('Time is up! Submitting exam...');
            submitExam();
        } else {
            timeLimit--;
            let minutes = Math.floor(timeLimit / 60);
            let seconds = timeLimit % 60;
            document.getElementById('timer').innerHTML = 
                `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        }
    }, 1000);
}

function confirmReset() {
    if (confirm('Reset all answers? This cannot be undone.')) {
        document.querySelectorAll('input[type="radio"]').forEach(radio => {
            radio.checked = false;
        });
        updateProgress();
    }
}

// ============= ANTI-CHEAT DETECTIONS =============

// 1. Tab switching
document.addEventListener('visibilitychange', function() {
    if (document.hidden && !examSubmitted) {
        tabSwitchCount++;
        document.getElementById('tabSwitches').value = tabSwitchCount;
        showWarning('Tab switching detected! Stay on the exam page.', tabSwitchCount, 3);
    }
});

// 2. Copy/Paste
document.addEventListener('copy', function(e) {
    e.preventDefault();
    if (!examSubmitted) {
        copyAttemptCount++;
        document.getElementById('copyAttempts').value = copyAttemptCount;
        showWarning('Copy/Paste is not allowed!', copyAttemptCount, 3);
    }
    return false;
});

document.addEventListener('paste', function(e) {
    e.preventDefault();
    if (!examSubmitted) {
        copyAttemptCount++;
        document.getElementById('copyAttempts').value = copyAttemptCount;
        showWarning('Copy/Paste is not allowed!', copyAttemptCount, 3);
    }
    return false;
});

document.addEventListener('cut', function(e) {
    e.preventDefault();
    if (!examSubmitted) {
        copyAttemptCount++;
        document.getElementById('copyAttempts').value = copyAttemptCount;
        showWarning('Copy/Paste is not allowed!', copyAttemptCount, 3);
    }
    return false;
});

// 3. Right-click (NOW auto-submits after 3)
document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
    if (!examSubmitted) {
        rightclickCount++;
        document.getElementById('rightclickAttempts').value = rightclickCount;
        showWarning('Right-click is disabled!', rightclickCount, 3);
    }
    return false;
});

// 4. Screenshot detection
document.addEventListener('keyup', function(e) {
    if (e.key === 'PrintScreen' || e.keyCode === 44) {
        e.preventDefault();
        if (!examSubmitted) {
            screenshotAttempts++;
            document.getElementById('screenshotAttempts').value = screenshotAttempts;
            showWarning('Screenshots are not allowed!', screenshotAttempts, 3);
        }
        return false;
    }
});

// 5. Windows + Shift + S (Snipping Tool)
document.addEventListener('keydown', function(e) {
    if ((e.ctrlKey || e.metaKey) && e.shiftKey && e.key === 'S') {
        e.preventDefault();
        if (!examSubmitted) {
            screenshotAttempts++;
            document.getElementById('screenshotAttempts').value = screenshotAttempts;
            showWarning('Screenshots are not allowed!', screenshotAttempts, 3);
        }
        return false;
    }
});

// 6. Mac screenshot shortcuts
document.addEventListener('keydown', function(e) {
    if (e.metaKey && e.shiftKey && (e.key === '3' || e.key === '4')) {
        e.preventDefault();
        if (!examSubmitted) {
            screenshotAttempts++;
            document.getElementById('screenshotAttempts').value = screenshotAttempts;
            showWarning('Screenshots are not allowed!', screenshotAttempts, 3);
        }
        return false;
    }
});

// 7. Prevent F5 and Ctrl+R
document.addEventListener('keydown', function(e) {
    if (e.key === 'F5' || (e.ctrlKey && e.key === 'r')) {
        e.preventDefault();
        if (!examSubmitted) {
            tabSwitchCount++;
            document.getElementById('tabSwitches').value = tabSwitchCount;
            showWarning('Page refresh is disabled!', tabSwitchCount, 3);
        }
        return false;
    }
});

// 8. Prevent Ctrl+C, Ctrl+V, Ctrl+X
document.addEventListener('keydown', function(e) {
    if ((e.ctrlKey || e.metaKey) && (e.key === 'c' || e.key === 'v' || e.key === 'x')) {
        e.preventDefault();
        if (!examSubmitted) {
            copyAttemptCount++;
            document.getElementById('copyAttempts').value = copyAttemptCount;
            showWarning('Copy/Paste is not allowed!', copyAttemptCount, 3);
        }
        return false;
    }
});

// 9. Print detection
window.addEventListener('beforeprint', function() {
    if (!examSubmitted) {
        screenshotAttempts++;
        document.getElementById('screenshotAttempts').value = screenshotAttempts;
        showWarning('Print/Screenshot detected!', screenshotAttempts, 3);
    }
});

// 10. FIXED: Warn before leaving page - BUT NOT when submitting
window.addEventListener('beforeunload', function(e) {
    // Only show warning if NOT submitting the form
    if (!examSubmitted && !isSubmitting) {
        e.preventDefault();
        e.returnValue = 'Your exam progress will be lost!';
        return 'Your exam progress will be lost!';
    }
});

startTimer();
</script>

<?php require_once "../app/views/layouts/footer.php"; ?>