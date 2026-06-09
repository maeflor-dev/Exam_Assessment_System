<?php require_once "../app/views/layouts/header.php"; ?>

<style>
/* Additional styles - only to ensure CSS variables work, NO functionality changes */
.card {
    background: #ffffff;
    border: none;
    border-radius: 16px;
}

.btn-primary {
    background: linear-gradient(135deg, #1a73e8, #0d47a1);
    border: none;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(26,115,232,0.3);
}

.btn-outline-primary {
    border: 1px solid #1a73e8;
    color: #1a73e8;
    background: transparent;
}

.btn-outline-primary:hover {
    background: #1a73e8;
    color: #ffffff;
}

.btn-outline-success {
    border: 1px solid #10b981;
    color: #10b981;
    background: transparent;
}

.btn-outline-success:hover {
    background: #10b981;
    color: #ffffff;
}

.bg-light {
    background-color: #f8f9fa !important;
}

.text-muted {
    color: #6c757d !important;
}

.invalid-feedback {
    display: block;
    color: #dc3545;
    font-size: 12px;
    margin-top: 5px;
}

.alert-danger {
    background-color: #f8d7da;
    border-color: #f5c6cb;
    color: #721c24;
    padding: 12px 16px;
    border-radius: 8px;
    margin-bottom: 20px;
}

.shadow-lg {
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175);
}

.animate-fadeInUp {
    animation: fadeInUp 0.5s ease;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<div class="row justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-lg-5 col-md-7 col-12">
        <div class="card shadow-lg animate-fadeInUp">
            <div class="card-body p-5">
                <div class="text-center mb-5">
                    <div class="mx-auto mb-4">
                        <i class="fas fa-graduation-cap" style="font-size: 48px; color: #1a73e8;"></i>
                    </div>
                    <h2 class="h3 mb-2">Welcome back</h2>
                    <p class="text-muted">Sign in to continue your learning journey</p>
                </div>

                <?php if(isset($errors['general'])): ?>
                    <div class="alert alert-danger mb-4">
                        <i class="fas fa-exclamation-triangle me-2"></i> <?= $errors['general'] ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="">
                    <div class="mb-4">
                        <label class="form-label">Email address</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0">
                                <i class="fas fa-envelope text-muted"></i>
                            </span>
                            <input type="email" name="email" class="form-control border-start-0 <?= isset($errors['email']) ? 'is-invalid' : '' ?>" 
                                   value="<?= htmlspecialchars($old['email'] ?? '') ?>" placeholder="you@example.com" required>
                            <?php if(isset($errors['email'])): ?>
                                <div class="invalid-feedback"><?= $errors['email'] ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0">
                                <i class="fas fa-lock text-muted"></i>
                            </span>
                            <input type="password" name="password" class="form-control border-start-0 <?= isset($errors['password']) ? 'is-invalid' : '' ?>" 
                                   placeholder="••••••••" required>
                            <?php if(isset($errors['password'])): ?>
                                <div class="invalid-feedback"><?= $errors['password'] ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-3">
                        <i class="fas fa-arrow-right me-2"></i> Sign In
                    </button>
                </form>

                <div class="mt-5 pt-3">
                    <div class="text-center">
                        <p class="text-muted small mb-3">Demo Accounts</p>
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="card bg-light border-0 p-3 text-center">
                                    <i class="fas fa-user-shield mb-2" style="color: #1a73e8; font-size: 24px;"></i>
                                    <div class="fw-semibold">Administrator</div>
                                    <small class="text-muted">admin@exam.com</small>
                                    <small class="text-muted">password</small>
                                    <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="fillAdmin()">
                                        <i class="fas fa-fill-drip me-1"></i> Fill
                                    </button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card bg-light border-0 p-3 text-center">
                                    <i class="fas fa-user-graduate mb-2" style="color: #10b981; font-size: 24px;"></i>
                                    <div class="fw-semibold">Student</div>
                                    <small class="text-muted">student@exam.com</small>
                                    <small class="text-muted">password</small>
                                    <button type="button" class="btn btn-sm btn-outline-success mt-2" onclick="fillStudent()">
                                        <i class="fas fa-fill-drip me-1"></i> Fill
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Keep original functionality EXACTLY the same
function fillAdmin() {
    document.querySelector('input[name="email"]').value = 'admin@exam.com';
    document.querySelector('input[name="password"]').value = 'password';
}

function fillStudent() {
    document.querySelector('input[name="email"]').value = 'student@exam.com';
    document.querySelector('input[name="password"]').value = 'password';
}
</script>

<?php require_once "../app/views/layouts/footer.php"; ?>