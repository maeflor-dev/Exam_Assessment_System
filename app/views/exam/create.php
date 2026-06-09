<?php require_once "../app/views/layouts/header.php"; ?>

<style>
    /* Dark Mode Compatible Styles - Uses CSS variables from header */
    .form-header {
        background: var(--bg-surface);
        border-radius: 12px;
        padding: 30px;
        margin-bottom: 20px;
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--border-light);
    }
    
    .form-title-input {
        font-size: 32px;
        font-weight: 500;
        border: none;
        border-bottom: 2px solid var(--border-light);
        padding: 10px 0;
        width: 100%;
        transition: all 0.3s;
        background: transparent;
        color: var(--text-primary);
    }
    
    .form-title-input:focus {
        outline: none;
        border-bottom-color: var(--primary);
    }
    
    .form-title-input::placeholder {
        color: var(--text-tertiary);
    }
    
    .form-desc-input {
        font-size: 14px;
        border: none;
        border-bottom: 1px solid var(--border-light);
        padding: 8px 0;
        width: 100%;
        margin-top: 15px;
        background: transparent;
        color: var(--text-secondary);
    }
    
    .form-desc-input:focus {
        outline: none;
        border-bottom-color: var(--primary);
    }
    
    .form-desc-input::placeholder {
        color: var(--text-tertiary);
    }
    
    .create-tabs {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
        border-bottom: 1px solid var(--border-light);
    }
    
    .tab-btn {
        padding: 12px 24px;
        background: none;
        border: none;
        cursor: pointer;
        font-size: 16px;
        font-weight: 500;
        color: var(--text-secondary);
        transition: all 0.3s;
        position: relative;
    }
    
    .tab-btn:hover {
        color: var(--primary);
    }
    
    .tab-btn.active {
        color: var(--primary);
    }
    
    .tab-btn.active::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        right: 0;
        height: 2px;
        background: var(--primary);
    }
    
    .tab-content {
        display: none;
    }
    
    .tab-content.active {
        display: block;
        animation: fadeIn 0.3s ease;
    }
    
    .bulk-import-area {
        background: var(--bg-surface);
        border-radius: 12px;
        padding: 30px;
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--border-light);
    }
    
    .import-example {
        background: var(--bg-surface-hover);
        border-radius: 8px;
        padding: 15px;
        margin: 15px 0;
        font-family: monospace;
        font-size: 12px;
        border: 1px solid var(--border-light);
        color: var(--text-secondary);
    }
    
    .bulk-textarea {
        font-family: monospace;
        font-size: 14px;
        line-height: 1.6;
        min-height: 350px;
        width: 100%;
        padding: 12px;
        border: 1px solid var(--border-light);
        border-radius: 8px;
        background: var(--bg-surface);
        color: var(--text-primary);
    }
    
    .bulk-textarea:focus {
        outline: none;
        border-color: var(--primary);
    }
    
    .bulk-textarea::placeholder {
        color: var(--text-tertiary);
    }
    
    .question-card {
        background: var(--bg-surface);
        border-radius: 12px;
        margin-bottom: 20px;
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--border-light);
        transition: all var(--transition-fast);
    }
    
    .question-card:hover {
        border-color: var(--primary);
        box-shadow: var(--shadow-md);
    }
    
    .question-header {
        padding: 20px 20px 0 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .question-number {
        font-size: 14px;
        font-weight: 500;
        color: var(--primary);
        background: var(--primary-light);
        padding: 4px 12px;
        border-radius: 20px;
    }
    
    .question-text-input {
        font-size: 16px;
        border: none;
        border-bottom: 1px solid var(--border-light);
        padding: 10px 0;
        width: 100%;
        margin: 15px 0;
        background: transparent;
        color: var(--text-primary);
    }
    
    .question-text-input:focus {
        outline: none;
        border-bottom-color: var(--primary);
    }
    
    .question-text-input::placeholder {
        color: var(--text-tertiary);
    }
    
    .options-container {
        padding: 0 20px 20px 20px;
    }
    
    .option-row {
        display: flex;
        align-items: center;
        margin-bottom: 12px;
        padding: 8px;
        border-radius: 8px;
        transition: all var(--transition-fast);
    }
    
    .option-row:hover {
        background: var(--bg-surface-hover);
    }
    
    .option-letter {
        width: 32px;
        height: 32px;
        background: var(--bg-surface-hover);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        margin-right: 12px;
        color: var(--text-secondary);
    }
    
    .option-input {
        flex: 1;
        border: none;
        border-bottom: 1px solid var(--border-light);
        padding: 8px;
        background: transparent;
        color: var(--text-primary);
    }
    
    .option-input:focus {
        outline: none;
        border-bottom-color: var(--primary);
    }
    
    .option-input::placeholder {
        color: var(--text-tertiary);
    }
    
    .correct-radio {
        margin-left: 12px;
        cursor: pointer;
        accent-color: var(--success);
    }
    
    .correct-label {
        margin-left: 5px;
        font-size: 12px;
        color: var(--success);
    }
    
    .action-btn {
        background: none;
        border: none;
        padding: 6px 12px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 13px;
        transition: all var(--transition-fast);
        color: var(--text-secondary);
    }
    
    .action-btn:hover {
        background: var(--bg-surface-hover);
        color: var(--primary);
    }
    
    .delete-btn { 
        color: var(--danger); 
    }
    
    .delete-btn:hover {
        background: var(--danger-light);
        color: var(--danger);
    }
    
    .add-question-btn, .import-btn {
        background: var(--bg-surface);
        border: 1px solid var(--border-light);
        border-radius: 12px;
        padding: 14px;
        width: 100%;
        cursor: pointer;
        margin-top: 20px;
        font-size: 16px;
        font-weight: 500;
        color: var(--primary);
        transition: all var(--transition-fast);
    }
    
    .add-question-btn:hover, .import-btn:hover {
        background: var(--primary-light);
        border-color: var(--primary);
        transform: translateY(-2px);
    }
    
    .submit-exam-btn {
        background: var(--gradient-primary);
        color: white;
        border: none;
        border-radius: 12px;
        padding: 16px;
        font-size: 16px;
        font-weight: 500;
        cursor: pointer;
        width: 100%;
        margin-top: 20px;
        transition: all var(--transition-fast);
    }
    
    .submit-exam-btn:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }
    
    .preview-badge {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: var(--primary);
        color: white;
        padding: 8px 16px;
        border-radius: 30px;
        font-size: 12px;
        cursor: pointer;
        z-index: 1000;
        transition: all var(--transition-fast);
    }
    
    .preview-badge:hover {
        transform: scale(1.05);
        background: var(--primary-dark);
    }
    
    .toast-message {
        position: fixed;
        bottom: 80px;
        right: 20px;
        padding: 12px 20px;
        border-radius: 8px;
        z-index: 1000;
        animation: slideIn 0.3s ease;
    }
    
    .toast-message.success { 
        background: var(--success); 
        color: white; 
    }
    .toast-message.error { 
        background: var(--danger); 
        color: white; 
    }
    .toast-message.warning { 
        background: var(--warning); 
        color: #1e1e1e; 
    }
    
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .batch-progress {
        background: var(--bg-surface-hover);
        border-radius: 8px;
        padding: 12px;
        margin: 15px 0;
        display: none;
        text-align: center;
        color: var(--text-secondary);
        border: 1px solid var(--border-light);
    }
    
    .batch-progress.show {
        display: block;
    }
    
    /* Form control overrides */
    .form-control {
        background: var(--bg-surface);
        border: 1px solid var(--border-light);
        color: var(--text-primary);
    }
    
    .form-control:focus {
        background: var(--bg-surface);
        border-color: var(--primary);
        color: var(--text-primary);
    }
    
    label {
        color: var(--text-secondary);
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .form-header {
            padding: 20px;
        }
        .form-title-input {
            font-size: 24px;
        }
        .option-row {
            flex-wrap: wrap;
        }
    }
</style>

<div class="container" style="max-width: 900px; margin: 20px auto;">
    <!-- Header -->
    <div class="form-header">
        <input type="text" id="examTitle" class="form-title-input" placeholder="Exam Title (Required)" autocomplete="off">
        <input type="text" id="examDesc" class="form-desc-input" placeholder="Description (optional)">
        <div class="row mt-3">
            <div class="col-md-6">
                <label>⏱️ Time Limit (minutes)</label>
                <input type="number" id="timeLimit" class="form-control" value="30" min="1" max="180">
            </div>
            <div class="col-md-6">
                <label>📊 Points per question</label>
                <input type="number" id="points" class="form-control" value="1" min="1">
            </div>
        </div>
    </div>

    <!-- Tabs -->
    <div class="create-tabs">
        <button class="tab-btn active" onclick="switchTab('manual', this)">✏️ Manual Entry</button>
        <button class="tab-btn" onclick="switchTab('bulk', this)">📋 Bulk Import</button>
    </div>

    <!-- Manual Entry Tab -->
    <div id="manualTab" class="tab-content active">
        <div id="questionsContainer"></div>
        <button class="add-question-btn" onclick="addQuestion()">+ Add Question</button>
    </div>

    <!-- Bulk Import Tab -->
    <div id="bulkTab" class="tab-content">
        <div class="bulk-import-area">
            <h5><i class="fas fa-file-import"></i> Bulk Import Questions</h5>
            <p class="text-muted">Paste your questions in ANY of these formats:</p>
            
            <div class="import-example">
                <strong>Format 1 (with Question: prefix):</strong><br>
                Question: What is PHP?<br>
                A. Personal Home Page<br>
                B. PHP: Hypertext Preprocessor<br>
                C. Preprocessor Hypertext<br>
                D. Professional Hosting Protocol<br>
                Correct: B<br>
                <br>
                <strong>Format 2 (numbered):</strong><br>
                1. What is PHP?<br>
                A. Personal Home Page<br>
                B. PHP: Hypertext Preprocessor<br>
                C. Preprocessor Hypertext<br>
                D. Professional Hosting Protocol<br>
                Answer: B
            </div>
            
            <textarea id="bulkQuestions" class="bulk-textarea" rows="12" 
                placeholder="Paste your questions here..."></textarea>
            
            <div id="batchProgress" class="batch-progress"></div>
            
            <button class="import-btn" id="importBtn" onclick="processImport()">
                <i class="fas fa-cloud-upload-alt"></i> Import Questions
            </button>
        </div>
    </div>
    
    <!-- Submit Button -->
    <button class="submit-exam-btn" onclick="submitExam()">
        Create Exam with <span id="totalQuestionsCount">0</span> Question(s)
    </button>
</div>

<div class="preview-badge" onclick="previewExam()">
    <i class="fas fa-eye"></i> Preview
</div>

<script>
let questionCounter = 0;

function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `toast-message ${type}`;
    toast.innerHTML = message;
    document.body.appendChild(toast);
    setTimeout(() => toast.remove(), 3000);
}

function switchTab(tab, btn) {
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
    document.getElementById(`${tab}Tab`).classList.add('active');
}

function addQuestion(questionData = null) {
    const id = questionCounter++;
    const container = document.getElementById('questionsContainer');
    const options = questionData ? questionData.options : ['', '', '', ''];
    const correctAnswer = questionData ? questionData.correct : 0;
    const questionText = questionData ? questionData.text : '';
    
    let optionsHtml = '';
    options.forEach((opt, idx) => {
        const letter = String.fromCharCode(65 + idx);
        optionsHtml += `
            <div class="option-row">
                <div class="option-letter">${letter}</div>
                <input type="text" class="option-input" id="opt${id}_${idx}" value="${escapeHtml(opt)}" placeholder="Option ${letter}">
                <input type="radio" name="correct_${id}" value="${idx}" class="correct-radio" ${correctAnswer == idx ? 'checked' : ''}>
                <span class="correct-label">Correct</span>
            </div>
        `;
    });
    
    const div = document.createElement('div');
    div.className = 'question-card';
    div.setAttribute('data-id', id);
    div.innerHTML = `
        <div class="question-header">
            <span class="question-number">Question ${getAllQuestions().length + 1}</span>
            <button class="action-btn delete-btn" onclick="deleteQuestion(${id})">🗑️ Delete</button>
        </div>
        <div style="padding: 0 20px;">
            <input type="text" id="qText${id}" class="question-text-input" value="${escapeHtml(questionText)}" placeholder="Enter your question here...">
        </div>
        <div class="options-container" id="options${id}">
            ${optionsHtml}
        </div>
        <div style="padding: 10px 20px 20px;">
            <button class="action-btn" onclick="duplicateQuestion(${id})">📋 Duplicate</button>
            <button class="action-btn" onclick="addOption(${id})">+ Add Option</button>
        </div>
    `;
    container.appendChild(div);
    updateTotalCount();
}

function getAllQuestions() {
    return document.querySelectorAll('.question-card');
}

function updateTotalCount() {
    document.getElementById('totalQuestionsCount').innerText = getAllQuestions().length;
}

function escapeHtml(text) {
    if (!text) return '';
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

function deleteQuestion(id) {
    const div = document.querySelector(`.question-card[data-id='${id}']`);
    if (div && getAllQuestions().length > 1) {
        div.remove();
        updateTotalCount();
        renumberQuestions();
    } else {
        showToast('You need at least one question', 'warning');
    }
}

function renumberQuestions() {
    document.querySelectorAll('.question-card').forEach((card, idx) => {
        card.querySelector('.question-number').innerText = `Question ${idx + 1}`;
    });
}

function duplicateQuestion(id) {
    const original = document.querySelector(`.question-card[data-id='${id}']`);
    const qText = document.getElementById(`qText${id}`).value;
    const options = [];
    const radios = [];
    
    document.querySelectorAll(`#options${id} .option-input`).forEach(input => {
        options.push(input.value);
    });
    document.querySelectorAll(`#options${id} .correct-radio`).forEach((radio, idx) => {
        if (radio.checked) radios.push(idx);
    });
    
    addQuestion({ text: qText, options: options, correct: radios[0] || 0 });
}

function addOption(id) {
    const container = document.getElementById(`options${id}`);
    const count = container.children.length;
    const letter = String.fromCharCode(65 + count);
    const optionRow = document.createElement('div');
    optionRow.className = 'option-row';
    optionRow.innerHTML = `
        <div class="option-letter">${letter}</div>
        <input type="text" class="option-input" placeholder="Option ${letter}">
        <input type="radio" name="correct_${id}" value="${count}" class="correct-radio">
        <span class="correct-label">Correct</span>
        <button class="action-btn" onclick="this.parentElement.remove()" style="margin-left: 10px;">✖️</button>
    `;
    container.appendChild(optionRow);
}

// ============= BULK IMPORT PARSER - UNIVERSAL =============
function parseBulkQuestions(text) {
    const questions = [];
    const lines = text.split(/\r?\n/);
    
    let currentQuestion = null;
    let currentOptions = [];
    let expectingCorrect = false;
    
    for (let line of lines) {
        line = line.trim();
        if (!line) continue;
        
        // Check if line starts a new question
        const isNewQuestion = line.match(/^(\d+\.|Question:|Q:)/i);
        
        if (isNewQuestion && currentQuestion) {
            // Save previous question
            if (currentQuestion && currentOptions.length >= 2) {
                questions.push({
                    text: currentQuestion,
                    options: [...currentOptions],
                    correct: 0
                });
            }
            // Start new question
            currentQuestion = line.replace(/^(\d+\.|Question:|Q:)\s*/i, '').trim();
            currentOptions = [];
            expectingCorrect = false;
        }
        else if (!currentQuestion && !isNewQuestion) {
            // First line is the question
            currentQuestion = line;
        }
        // Check for option lines (A., A), A -, A:)
        else if (line.match(/^[A-D][\.\):\-]?\s/i)) {
            const optionText = line.replace(/^[A-D][\.\):\-]?\s*/i, '').trim();
            if (optionText) {
                currentOptions.push(optionText);
            }
            expectingCorrect = false;
        }
        // Check for correct answer indicator
        else if (line.match(/^(Correct|Answer|Key):\s*[A-D]/i)) {
            const match = line.match(/[A-D]/i);
            if (match && currentOptions.length > 0) {
                const correctIndex = match[0].toUpperCase().charCodeAt(0) - 65;
                if (questions.length > 0) {
                    questions[questions.length - 1].correct = correctIndex;
                } else if (currentQuestion) {
                    expectingCorrect = correctIndex;
                }
            }
        }
        // If line is just a letter (A, B, C, D)
        else if (line.match(/^[A-D]$/i) && currentOptions.length > 0) {
            const correctIndex = line.toUpperCase().charCodeAt(0) - 65;
            if (questions.length > 0) {
                questions[questions.length - 1].correct = correctIndex;
            }
        }
        // If line looks like an answer (just the letter at end)
        else if (line.match(/^[A-D]$/i) && currentOptions.length === 0) {
            expectingCorrect = line.toUpperCase().charCodeAt(0) - 65;
        }
    }
    
    // Save last question
    if (currentQuestion && currentOptions.length >= 2) {
        questions.push({
            text: currentQuestion,
            options: [...currentOptions],
            correct: expectingCorrect !== false ? expectingCorrect : 0
        });
    }
    
    return questions;
}

async function processImport() {
    const textarea = document.getElementById('bulkQuestions');
    const text = textarea.value;
    const progress = document.getElementById('batchProgress');
    const importBtn = document.getElementById('importBtn');
    
    if (!text.trim()) {
        showToast('Please paste your questions first', 'warning');
        return;
    }
    
    // Show progress
    progress.className = 'batch-progress show';
    progress.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing your questions...';
    importBtn.disabled = true;
    
    // Simulate processing for better UX
    setTimeout(() => {
        const questions = parseBulkQuestions(text);
        
        if (questions.length === 0) {
            progress.innerHTML = '❌ No valid questions found. Please check the format.';
            progress.style.background = '#fce8e6';
            progress.style.color = '#d93025';
            showToast('No valid questions found. Please check the format example.', 'error');
            importBtn.disabled = false;
            setTimeout(() => {
                progress.className = 'batch-progress';
            }, 3000);
            return;
        }
        
        // Clear existing questions
        document.getElementById('questionsContainer').innerHTML = '';
        questionCounter = 0;
        
        // Add all parsed questions
        questions.forEach(q => {
            addQuestion({
                text: q.text,
                options: q.options,
                correct: q.correct
            });
        });
        
        progress.innerHTML = `✅ Successfully imported ${questions.length} questions!`;
        progress.style.background = '#e6f4ea';
        progress.style.color = '#137333';
        showToast(`✅ Imported ${questions.length} questions successfully!`, 'success');
        
        // Clear textarea
        textarea.value = '';
        
        // Switch to manual tab
        document.querySelector('.tab-btn').click();
        
        setTimeout(() => {
            progress.className = 'batch-progress';
            importBtn.disabled = false;
        }, 2000);
        
    }, 500);
}

function collectExamData() {
    const title = document.getElementById('examTitle').value.trim();
    const timeLimit = document.getElementById('timeLimit').value;
    const questions = [];
    
    document.querySelectorAll('.question-card').forEach(card => {
        const id = card.getAttribute('data-id');
        const text = document.getElementById(`qText${id}`).value.trim();
        if (!text) return;
        
        const options = [];
        document.querySelectorAll(`#options${id} .option-input`).forEach(input => {
            if (input.value.trim()) options.push(input.value.trim());
        });
        
        let correct = 0;
        document.querySelectorAll(`#options${id} .correct-radio`).forEach((radio, idx) => {
            if (radio.checked) correct = idx;
        });
        
        if (options.length >= 2) {
            questions.push({ text, options, correct });
        }
    });
    
    return { title, time_limit: timeLimit, questions };
}

function validateExam() {
    const data = collectExamData();
    
    if (!data.title) {
        showToast('❌ Please enter an exam title', 'error');
        document.getElementById('examTitle').focus();
        return false;
    }
    
    if (data.title.length < 3) {
        showToast('❌ Title must be at least 3 characters', 'error');
        return false;
    }
    
    if (data.time_limit < 1) {
        showToast('❌ Time limit must be at least 1 minute', 'error');
        return false;
    }
    
    if (data.questions.length === 0) {
        showToast('❌ Please add at least one question', 'error');
        return false;
    }
    
    for (let i = 0; i < data.questions.length; i++) {
        if (!data.questions[i].text) {
            showToast(`❌ Question ${i + 1} has no text`, 'error');
            return false;
        }
        if (data.questions[i].options.length < 2) {
            showToast(`❌ Question ${i + 1} needs at least 2 options`, 'error');
            return false;
        }
    }
    
    return true;
}

function submitExam() {
    if (!validateExam()) return;
    
    const data = collectExamData();
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '<?= BASE_URL ?>/public/index.php?url=exam/createComplete';
    
    const addField = (name, value) => {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = value;
        form.appendChild(input);
    };
    
    addField('title', data.title);
    addField('time_limit', data.time_limit);
    
    data.questions.forEach((q, idx) => {
        addField(`questions[${idx}][text]`, q.text);
        q.options.forEach((opt, optIdx) => {
            addField(`questions[${idx}][option_${String.fromCharCode(97 + optIdx)}]`, opt);
        });
        addField(`questions[${idx}][correct]`, q.correct);
    });
    
    document.body.appendChild(form);
    const submitBtn = document.querySelector('.submit-exam-btn');
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Creating Exam...';
    submitBtn.disabled = true;
    form.submit();
}

function previewExam() {
    const data = collectExamData();
    const previewWindow = window.open('', '_blank', 'width=800,height=600');
    previewWindow.document.write(`
        <html>
        <head>
            <title>Preview: ${escapeHtml(data.title)}</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <style>
                body { background: #f0f2f5; padding: 20px; }
                .preview-card { background: white; border-radius: 12px; padding: 30px; margin-bottom: 20px; }
                .preview-question { background: white; border-radius: 12px; padding: 20px; margin-bottom: 15px; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="preview-card">
                    <h2>${escapeHtml(data.title)}</h2>
                    <p>Time: ${data.time_limit} minutes | Questions: ${data.questions.length}</p>
                </div>
                ${data.questions.map((q, idx) => `
                    <div class="preview-question">
                        <h5>${idx + 1}. ${escapeHtml(q.text)}</h5>
                        ${q.options.map((opt, optIdx) => `
                            <div class="form-check mt-2">
                                <input type="radio" class="form-check-input" name="q${idx}">
                                <label>${String.fromCharCode(65 + optIdx)}. ${escapeHtml(opt)}</label>
                            </div>
                        `).join('')}
                    </div>
                `).join('')}
                <div class="alert alert-info">This is a preview. Click Create to save.</div>
            </div>
        </body>
        </html>
    `);
}

// Initialize with 2 default questions
addQuestion();
addQuestion();
</script>

<?php require_once "../app/views/layouts/footer.php"; ?>