<?php require_once "../app/views/layouts/header.php"; ?>

<div class="animate-fadeInUp">
    <!-- Stats Row -->
    <div class="row g-4 mb-6">
        <div class="col-sm-6 col-lg-4">
            <div class="card text-center h-100">
                <div class="card-body py-5">
                    <div class="bg-primary-light d-inline-flex p-3 rounded-circle mb-3" style="background: var(--primary-light);">
                        <i class="fas fa-file-alt fa-2x" style="color: var(--primary);"></i>
                    </div>
                    <div class="display-4 fw-bold mb-1"><?= count($exams) ?></div>
                    <div class="text-muted">Total Exams</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card text-center h-100">
                <div class="card-body py-5">
                    <div class="bg-success-light d-inline-flex p-3 rounded-circle mb-3" style="background: var(--success-light);">
                        <i class="fas fa-users fa-2x" style="color: var(--success);"></i>
                    </div>
                    <div class="display-4 fw-bold mb-1"><?= count($results) ?></div>
                    <div class="text-muted">Total Submissions</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card text-center h-100">
                <div class="card-body py-5">
                    <div class="bg-warning-light d-inline-flex p-3 rounded-circle mb-3" style="background: var(--warning-light);">
                        <i class="fas fa-question-circle fa-2x" style="color: var(--warning);"></i>
                    </div>
                    <div class="display-4 fw-bold mb-1"><?= array_sum(array_column($exams, 'question_count')) ?></div>
                    <div class="text-muted">Total Questions</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-5">
        <!-- Left Column - Create Exam -->
        <div class="col-lg-5">
            <!-- Create Exam Card -->
            <div class="card mb-5">
                <div class="card-header bg-transparent">
                    <i class="fas fa-plus-circle me-2" style="color: var(--success);"></i>
                    Create New Assessment
                </div>
                <div class="card-body text-center py-5">
                    <i class="fas fa-google" style="font-size: 56px; color: var(--primary);"></i>
                    <h5 class="mt-3 mb-2">Google Forms Style Creator</h5>
                    <p class="text-muted small mb-4">Create exams with multiple questions at once, bulk import, and AI generation</p>
                    <a href="<?= BASE_URL ?>/public/index.php?url=exam/create" class="btn btn-primary w-100 py-3">
                        <i class="fas fa-plus-circle me-2"></i> Create New Exam
                    </a>
                </div>
            </div>
            
            <!-- Existing Exams List -->
            <div class="card">
                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-list me-2"></i>Your Exams</span>
                    <span class="badge bg-secondary"><?= count($exams) ?> Total</span>
                </div>
                <div class="card-body p-0">
                    <?php if(empty($exams)): ?>
                        <div class="text-center py-6">
                            <i class="fas fa-inbox" style="font-size: 48px; opacity: 0.3;"></i>
                            <p class="text-muted mt-3 mb-0">No exams created yet</p>
                        </div>
                    <?php else: ?>
                        <div class="list-group list-group-flush">
                            <?php foreach($exams as $exam): ?>
                                <div class="list-group-item d-flex justify-content-between align-items-center py-3">
                                    <div class="flex-grow-1">
                                        <div class="fw-semibold mb-1"><?= htmlspecialchars($exam['title']) ?></div>
                                        <div class="small text-muted">
                                            <i class="far fa-clock me-1"></i><?= $exam['time_limit'] ?> min
                                            <span class="mx-2">•</span>
                                            <i class="fas fa-question-circle me-1"></i><?= $exam['question_count'] ?> questions
                                        </div>
                                    </div>
                                    <a href="<?= BASE_URL ?>/public/index.php?url=exam/addQuestion/<?= $exam['id'] ?>" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-plus me-1"></i> Add
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Right Column - Student Performance Table -->
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-chart-line me-2" style="color: var(--info);"></i>Student Performance</span>
                    <span class="badge bg-info"><?= count($results) ?> Submissions</span>
                </div>
                <div class="card-body p-0">
                    <?php if(empty($results)): ?>
                        <div class="text-center py-6">
                            <i class="fas fa-chart-line" style="font-size: 48px; opacity: 0.3;"></i>
                            <p class="text-muted mt-3 mb-0">No results yet</p>
                            <p class="text-muted small">Students haven't taken any exams</p>
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0 align-middle">
                                <thead>
                                    <tr class="bg-light">
                                        <th style="width: 25%; padding: 12px 16px;">Student</th>
                                        <th style="width: 25%; padding: 12px 16px;">Exam</th>
                                        <th style="width: 15%; padding: 12px 16px;">Score</th>
                                        <th style="width: 25%; padding: 12px 16px;">Progress</th>
                                        <th style="width: 10%; padding: 12px 16px;">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($results as $result): ?>
                                        <?php 
                                        $percentage = ($result['score']/$result['total_questions'])*100;
                                        $badgeClass = $percentage >= 70 ? 'success' : ($percentage >= 50 ? 'warning' : 'danger');
                                        $progressClass = $percentage >= 70 ? 'success' : ($percentage >= 50 ? 'warning' : 'danger');
                                        ?>
                                        <tr>
                                            <td style="padding: 12px 16px;">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <i class="fas fa-user-circle fa-lg text-muted"></i>
                                                    </div>
                                                    <div class="ms-3">
                                                        <div class="fw-medium"><?= htmlspecialchars($result['name']) ?></div>
                                                        <div class="small text-muted"><?= htmlspecialchars($result['email']) ?></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="padding: 12px 16px;">
                                                <span class="fw-medium"><?= htmlspecialchars($result['exam_title']) ?></span>
                                            </td>
                                            <td style="padding: 12px 16px;">
                                                <span class="badge bg-<?= $badgeClass ?>"><?= $result['score'] ?>/<?= $result['total_questions'] ?></span>
                                            </td>
                                            <td style="padding: 12px 16px;">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="progress flex-grow-1" style="height: 8px;">
                                                        <div class="progress-bar bg-<?= $progressClass ?>" 
                                                             style="width: <?= $percentage ?>%"></div>
                                                    </div>
                                                    <span class="small fw-semibold" style="min-width: 45px;"><?= round($percentage, 1) ?>%</span>
                                                </div>
                                            </td>
                                            <td style="padding: 12px 16px;">
                                                <small class="text-muted"><?= date('M d, Y', strtotime($result['submitted_at'])) ?></small>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Table alignment fixes */
    .table th, 
    .table td {
        vertical-align: middle;
        border-bottom: 1px solid var(--border-light);
    }
    
    .table thead th {
        font-weight: 600;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--text-secondary);
        border-bottom: 2px solid var(--border-light);
    }
    
    .badge {
        font-weight: 500;
        padding: 4px 10px;
    }
    
    .progress {
        background-color: var(--bg-surface-hover);
    }
    
    /* Card header alignment */
    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    /* Responsive table */
    @media (max-width: 768px) {
        .table th:nth-child(2),
        .table td:nth-child(2),
        .table th:nth-child(4),
        .table td:nth-child(4) {
            display: none;
        }
        
        .table th, 
        .table td {
            padding: 10px 12px !important;
        }
    }
</style>

<?php require_once "../app/views/layouts/footer.php"; ?>