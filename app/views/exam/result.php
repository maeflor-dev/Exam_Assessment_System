<?php require_once "../app/views/layouts/header.php"; ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card text-center">
            <div class="card-header bg-success text-white">
                <h3>Exam Results</h3>
            </div>
            <div class="card-body">
                <h1 class="display-1"><?= round($percentage, 1) ?>%</h1>
                <div class="alert alert-info">
                    <h4>Your Score: <?= $score ?> out of <?= $total ?></h4>
                </div>
                <?php if($percentage >= 70): ?>
                    <div class="alert alert-success">
                        <i class="fas fa-trophy"></i> Excellent! You passed!
                    </div>
                <?php elseif($percentage >= 50): ?>
                    <div class="alert alert-warning">
                        <i class="fas fa-thumbs-up"></i> Good effort! Keep practicing!
                    </div>
                <?php else: ?>
                    <div class="alert alert-danger">
                        <i class="fas fa-book"></i> Keep learning! Try again!
                    </div>
                <?php endif; ?>
                <a href="<?= BASE_URL ?>/public/index.php?url=dashboard" class="btn btn-primary mt-3">
                    Back to Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<?php require_once "../app/views/layouts/footer.php"; ?>