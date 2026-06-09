<?php require_once "../app/views/layouts/header.php"; ?>

<div class="animate-fadeInUp">
    <!-- Welcome Hero -->
    <div class="card bg-gradient-primary text-white border-0 mb-6">
        <div class="card-body p-6">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold mb-2">Welcome back, <?= htmlspecialchars($_SESSION['user_name']) ?>! 👋</h1>
                    <p class="lead mb-0 opacity-90">Ready to challenge yourself today? Choose an exam below.</p>
                </div>
                <div class="col-md-4 text-center d-none d-md-block">
                    <i class="fas fa-rocket" style="font-size: 80px; opacity: 0.9;"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-5">
        <!-- Available Exams -->
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="h4 mb-0">📚 Available Assessments</h3>
                <span class="badge bg-primary"><?= count($exams) ?> Total Exam</span>
            </div>

            <?php if(empty($exams)): ?>
                <div class="card text-center py-6">
                    <div class="card-body">
                        <i class="fas fa-inbox" style="font-size: 48px; opacity: 0.3;"></i>
                        <p class="text-muted mt-3 mb-0">No assessments available at the moment</p>
                    </div>
                </div>
            <?php else: ?>
                <div class="row g-4">
                    <?php 
                    $resultCheck = new Result();
                    foreach($exams as $exam): 
                        $hasTaken = $resultCheck->hasTakenExam($_SESSION['user_id'], $exam['id']);
                    ?>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <div>
                                            <div class="display-6 fw-bold text-primary mb-0"><?= $exam['question_count'] ?></div>
                                            <small class="text-muted">Questions</small>
                                        </div>
                                        <span class="badge bg-warning">
                                            <i class="far fa-clock me-1"></i> <?= $exam['time_limit'] ?> min
                                        </span>
                                    </div>
                                    <h4 class="h5 mb-2"><?= htmlspecialchars($exam['title']) ?></h4>
                                    <p class="text-muted small mb-4">Multiple Choice Questions</p>
                                    
                                    <?php if($hasTaken): ?>
                                        <button class="btn btn-success w-100" disabled>
                                            <i class="fas fa-check-circle me-2"></i> Completed
                                        </button>
                                    <?php elseif($exam['question_count'] > 0): ?>
                                        <a href="<?= BASE_URL ?>/public/index.php?url=exam/take/<?= $exam['id'] ?>" class="btn btn-primary w-100">
                                            <i class="fas fa-play me-2"></i> Start Exam
                                        </a>
                                    <?php else: ?>
                                        <button class="btn btn-secondary w-100" disabled>
                                            <i class="fas fa-exclamation-triangle me-2"></i> No Questions
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Results Sidebar -->
        <div class="col-lg-4">
            <div class="card sticky-top" style="top: 100px;">
                <div class="card-header bg-transparent">
                    <i class="fas fa-trophy me-2" style="color: var(--warning);"></i>
                    My Achievements
                </div>
                <div class="card-body">
                    <?php if(empty($results)): ?>
                        <div class="text-center py-5">
                            <i class="fas fa-star" style="font-size: 48px; opacity: 0.3;"></i>
                            <p class="text-muted mt-3 mb-0">No results yet<br>Take an exam to see your scores</p>
                        </div>
                    <?php else: ?>
                        <?php 
                        $totalScore = 0;
                        $totalQuestions = 0;
                        foreach($results as $result) {
                            $totalScore += $result['score'];
                            $totalQuestions += $result['total_questions'];
                        }
                        $avgPercentage = $totalQuestions > 0 ? ($totalScore / $totalQuestions) * 100 : 0;
                        ?>
                        <div class="text-center mb-4 pb-3 border-bottom">
                            <div class="display-4 fw-bold text-gradient"><?= round($avgPercentage, 1) ?>%</div>
                            <small class="text-muted">Average Score</small>
                            <div class="progress mt-3" style="height: 6px;">
                                <div class="progress-bar bg-success" style="width: <?= $avgPercentage ?>%"></div>
                            </div>
                        </div>
                        
                        <?php foreach($results as $result): ?>
                            <?php $percentage = ($result['score']/$result['total_questions'])*100; ?>
                            <div class="border-bottom pb-3 mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <strong class="small"><?= htmlspecialchars($result['exam_title']) ?></strong>
                                    <span class="badge bg-<?= $percentage >= 70 ? 'success' : ($percentage >= 50 ? 'warning' : 'danger') ?>">
                                        <?= round($percentage, 1) ?>%
                                    </span>
                                </div>
                                <div class="progress mb-2" style="height: 4px;">
                                    <div class="progress-bar bg-<?= $percentage >= 70 ? 'success' : ($percentage >= 50 ? 'warning' : 'danger') ?>" 
                                         style="width: <?= $percentage ?>%"></div>
                                </div>
                                <div class="d-flex justify-content-between small text-muted">
                                    <span>Score: <?= $result['score'] ?>/<?= $result['total_questions'] ?></span>
                                    <span><?= date('M d', strtotime($result['submitted_at'])) ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once "../app/views/layouts/footer.php"; ?>