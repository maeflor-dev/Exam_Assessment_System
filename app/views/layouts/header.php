<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title><?= SITE_NAME ?> | Modern Assessment Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* ========================================
           DESIGN SYSTEM - 8px Spacing Grid
           ======================================== */
        :root {
            /* Spacing (8px system) */
            --space-1: 4px;
            --space-2: 8px;
            --space-3: 12px;
            --space-4: 16px;
            --space-5: 20px;
            --space-6: 24px;
            --space-7: 32px;
            --space-8: 40px;
            --space-9: 48px;
            --space-10: 64px;
            --space-11: 80px;
            --space-12: 96px;
            
            /* Border Radius */
            --radius-sm: 6px;
            --radius-md: 8px;
            --radius-lg: 12px;
            --radius-xl: 16px;
            --radius-2xl: 20px;
            --radius-3xl: 24px;
            
            /* Typography */
            --font-xs: 12px;
            --font-sm: 14px;
            --font-base: 16px;
            --font-md: 18px;
            --font-lg: 20px;
            --font-xl: 24px;
            --font-2xl: 30px;
            --font-3xl: 36px;
            --font-4xl: 48px;
            
            /* Shadows */
            --shadow-xs: 0 1px 2px rgba(0,0,0,0.05);
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.1), 0 1px 2px rgba(0,0,0,0.06);
            --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04);
            
            /* Transitions */
            --transition-fast: 150ms ease;
            --transition-base: 250ms ease;
            --transition-slow: 350ms ease;
        }
        
        /* Light Theme */
        [data-theme="light"] {
            --bg-page: #f8fafc;
            --bg-surface: #ffffff;
            --bg-surface-hover: #f1f5f9;
            --bg-elevated: #ffffff;
            --bg-primary-light: #eff6ff;
            --bg-success-light: #ecfdf5;
            --bg-warning-light: #fffbeb;
            --bg-danger-light: #fef2f2;
            --bg-info-light: #ecfeff;
            
            --text-primary: #0f172a;
            --text-secondary: #475569;
            --text-tertiary: #64748b;
            --text-disabled: #94a3b8;
            --text-muted: #6b7280;
            
            --border-light: #e2e8f0;
            --border-medium: #cbd5e1;
            --border-heavy: #94a3b8;
            
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --primary-light: #eff6ff;
            --success: #10b981;
            --success-dark: #059669;
            --success-light: #ecfdf5;
            --warning: #f59e0b;
            --warning-dark: #d97706;
            --warning-light: #fffbeb;
            --danger: #ef4444;
            --danger-dark: #dc2626;
            --danger-light: #fef2f2;
            --info: #06b6d4;
            --info-dark: #0891b2;
            --info-light: #ecfeff;
            
            --gradient-primary: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            --gradient-success: linear-gradient(135deg, #10b981 0%, #34d399 100%);
        }
        
        /* Dark Theme - High Contrast for Readability */
        [data-theme="dark"] {
            --bg-page: #0a0e1a;
            --bg-surface: #111827;
            --bg-surface-hover: #626364;
            --bg-elevated: #1f2937;
            --bg-primary-light: rgba(59,130,246,0.15);
            --bg-success-light: rgba(16,185,129,0.15);
            --bg-warning-light: rgba(245,158,11,0.15);
            --bg-danger-light: rgba(239,68,68,0.15);
            --bg-info-light: rgba(6,182,212,0.15);
            
            --text-primary: #f3f4f6;
            --text-secondary: #d1d5db;
            --text-tertiary: #9ca3af;
            --text-disabled: #6b7280;
            --text-muted: #9ca3af;
            
            --border-light: #1f2937;
            --border-medium: #374151;
            --border-heavy: #4b5563;
            
            --primary: #60a5fa;
            --primary-dark: #3b82f6;
            --primary-light: rgba(96,165,250,0.1);
            --success: #34d399;
            --success-dark: #10b981;
            --success-light: rgba(52,211,153,0.1);
            --warning: #fbbf24;
            --warning-dark: #f59e0b;
            --warning-light: rgba(251,191,36,0.1);
            --danger: #f87171;
            --danger-dark: #ef4444;
            --danger-light: rgba(248,113,113,0.1);
            --info: #22d3ee;
            --info-dark: #06b6d4;
            --info-light: rgba(34,211,238,0.1);
            
            --gradient-primary: linear-gradient(135deg, #60a5fa 0%, #a78bfa 100%);
            --gradient-success: linear-gradient(135deg, #34d399 0%, #6ee7b7 100%);
            
            --shadow-sm: 0 1px 2px rgba(0,0,0,0.3);
            --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.4);
            --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.4);
            --shadow-xl: 0 20px 25px -5px rgba(0,0,0,0.4);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: var(--bg-page);
            color: var(--text-primary);
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        
        /* Typography */
        h1, .h1 { font-size: var(--font-4xl); font-weight: 700; letter-spacing: -0.02em; line-height: 1.2; margin-bottom: var(--space-4); color: var(--text-primary); }
        h2, .h2 { font-size: var(--font-3xl); font-weight: 700; letter-spacing: -0.01em; line-height: 1.3; margin-bottom: var(--space-3); color: var(--text-primary); }
        h3, .h3 { font-size: var(--font-2xl); font-weight: 600; letter-spacing: -0.01em; line-height: 1.4; margin-bottom: var(--space-3); color: var(--text-primary); }
        h4, .h4 { font-size: var(--font-xl); font-weight: 600; line-height: 1.4; margin-bottom: var(--space-2); color: var(--text-primary); }
        p { color: var(--text-secondary); }
        
        .text-gradient { background: var(--gradient-primary); -webkit-background-clip: text; background-clip: text; color: transparent; }
        .text-muted { color: var(--text-muted) !important; }
        
        /* Navigation */
        .navbar {
            background: var(--bg-surface);
            border-bottom: 1px solid var(--border-light);
            padding: var(--space-3) 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: var(--font-lg);
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-decoration: none;
            letter-spacing: -0.01em;
        }
        
        /* Cards */
        .card {
            background: var(--bg-surface);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-xl);
            transition: all var(--transition-base);
            overflow: hidden;
        }
        
        .card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }
        
        .card-header {
            background: transparent;
            border-bottom: 1px solid var(--border-light);
            padding: var(--space-5) var(--space-6);
            font-weight: 600;
            font-size: var(--font-base);
            color: var(--text-primary);
        }
        
        .card-body { padding: var(--space-6); }
        .card-footer { background: transparent; border-top: 1px solid var(--border-light); padding: var(--space-4) var(--space-6); }
        
        /* Buttons */
        .btn {
            border-radius: var(--radius-md);
            padding: var(--space-2) var(--space-5);
            font-weight: 500;
            font-size: var(--font-sm);
            transition: all var(--transition-fast);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: var(--space-2);
            cursor: pointer;
            border: none;
        }
        
        .btn-primary {
            background: var(--primary);
            color: white;
        }
        
        .btn-primary:hover, .btn-primary:focus {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }
        
        .btn-outline {
            background: transparent;
            border: 1px solid var(--border-medium);
            color: var(--text-primary);
        }
        
        .btn-outline:hover, .btn-outline:focus {
            border-color: var(--primary);
            background: var(--primary-light);
            color: var(--primary);
        }
        
        .btn-success {
            background: var(--success);
            color: white;
        }
        
        .btn-success:hover {
            background: var(--success-dark);
            transform: translateY(-1px);
        }
        
        .btn-danger {
            background: var(--danger);
            color: white;
        }
        
        .btn-danger:hover {
            background: var(--danger-dark);
        }
        
        .btn-warning {
            background: var(--warning);
            color: #1a1a2e;
        }
        
        .btn-warning:hover {
            background: var(--warning-dark);
        }
        
        .btn-lg { padding: var(--space-3) var(--space-6); font-size: var(--font-base); min-height: 48px; }
        .btn-sm { padding: var(--space-1) var(--space-3); font-size: var(--font-xs); min-height: 32px; }
        
        /* Forms */
        .form-control, .form-select {
            background: var(--bg-surface);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-md);
            padding: var(--space-3) var(--space-4);
            color: var(--text-primary);
            font-size: var(--font-sm);
            transition: all var(--transition-fast);
            width: 100%;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(96,165,250,0.2);
            outline: none;
        }
        
        .form-control::placeholder {
            color: var(--text-tertiary);
        }
        
        .form-control.is-invalid, .form-select.is-invalid {
            border-color: var(--danger);
        }
        
        .form-label {
            font-weight: 500;
            margin-bottom: var(--space-2);
            color: var(--text-secondary);
            font-size: var(--font-sm);
        }
        
        .input-group-text {
            background: var(--bg-surface);
            border: 1px solid var(--border-light);
            color: var(--text-tertiary);
        }
        
        /* Alerts */
        .alert {
            border-radius: var(--radius-lg);
            border: none;
            padding: var(--space-4) var(--space-5);
            margin-bottom: var(--space-5);
        }
        
        .alert-success { background: var(--bg-success-light); color: var(--success); border-left: 3px solid var(--success); }
        .alert-success .text-muted { color: var(--success-dark) !important; }
        .alert-danger { background: var(--bg-danger-light); color: var(--danger); border-left: 3px solid var(--danger); }
        .alert-info { background: var(--bg-info-light); color: var(--info); border-left: 3px solid var(--info); }
        .alert-warning { background: var(--bg-warning-light); color: var(--warning); border-left: 3px solid var(--warning); }
        
        /* Container */
        .container { max-width: 1280px; padding: 0 var(--space-5); margin: 0 auto; }
        
        /* Badge */
        .badge {
            padding: var(--space-1) var(--space-3);
            border-radius: var(--radius-xl);
            font-size: var(--font-xs);
            font-weight: 500;
        }
        
        .badge.bg-primary { background: var(--primary) !important; color: white; }
        .badge.bg-success { background: var(--success) !important; color: white; }
        .badge.bg-warning { background: var(--warning) !important; color: #1a1a2e; }
        .badge.bg-danger { background: var(--danger) !important; color: white; }
        .badge.bg-info { background: var(--info) !important; color: white; }
        .badge.bg-secondary { background: var(--border-medium) !important; color: var(--text-primary); }
        
        /* Tables */
        .table {
            color: var(--text-primary);
        }
        
        .table > :not(caption) > * > * {
            padding: var(--space-3) var(--space-4);
            border-bottom-color: var(--border-light);
            color: var(--text-secondary);
        }
        
        .table thead th {
            color: var(--text-primary);
            font-weight: 600;
            background: var(--bg-surface-hover);
        }
        
        .table tbody tr:hover {
            background: var(--bg-surface-hover);
        }
        
        .table-light {
            background: var(--bg-surface-hover);
        }
        
        /* Progress */
        .progress {
            height: 6px;
            border-radius: var(--radius-sm);
            background: var(--bg-surface-hover);
        }
        
        .progress-bar {
            border-radius: var(--radius-sm);
            transition: width var(--transition-base);
        }
        
        .progress-bar.bg-success { background: var(--success) !important; }
        .progress-bar.bg-warning { background: var(--warning) !important; }
        .progress-bar.bg-danger { background: var(--danger) !important; }
        .progress-bar.bg-primary { background: var(--primary) !important; }
        
        /* List Group */
        .list-group-item {
            background: var(--bg-surface);
            border-color: var(--border-light);
            color: var(--text-primary);
        }
        
        .list-group-item:hover {
            background: var(--bg-surface-hover);
        }
        
        /* Utilities */
        .border { border-color: var(--border-light) !important; }
        .border-bottom { border-bottom-color: var(--border-light) !important; }
        .bg-light { background: var(--bg-surface-hover) !important; }
        .bg-primary-light { background: var(--bg-primary-light) !important; }
        .bg-success-light { background: var(--bg-success-light) !important; }
        .bg-warning-light { background: var(--bg-warning-light) !important; }
        
        /* Spacing Utilities */
        .mt-0 { margin-top: 0; }
        .mt-1 { margin-top: var(--space-1); }
        .mt-2 { margin-top: var(--space-2); }
        .mt-3 { margin-top: var(--space-3); }
        .mt-4 { margin-top: var(--space-4); }
        .mt-5 { margin-top: var(--space-5); }
        .mt-6 { margin-top: var(--space-6); }
        .mb-0 { margin-bottom: 0; }
        .mb-1 { margin-bottom: var(--space-1); }
        .mb-2 { margin-bottom: var(--space-2); }
        .mb-3 { margin-bottom: var(--space-3); }
        .mb-4 { margin-bottom: var(--space-4); }
        .mb-5 { margin-bottom: var(--space-5); }
        .mb-6 { margin-bottom: var(--space-6); }
        .py-2 { padding-top: var(--space-2); padding-bottom: var(--space-2); }
        .py-3 { padding-top: var(--space-3); padding-bottom: var(--space-3); }
        .py-4 { padding-top: var(--space-4); padding-bottom: var(--space-4); }
        .py-5 { padding-top: var(--space-5); padding-bottom: var(--space-5); }
        .px-3 { padding-left: var(--space-3); padding-right: var(--space-3); }
        .px-4 { padding-left: var(--space-4); padding-right: var(--space-4); }
        .px-5 { padding-left: var(--space-5); padding-right: var(--space-5); }
        .gap-2 { gap: var(--space-2); }
        .gap-3 { gap: var(--space-3); }
        .gap-4 { gap: var(--space-4); }
        
        /* Responsive */
        @media (max-width: 768px) {
            .container { padding: 0 var(--space-4); }
            .card-header { padding: var(--space-4); }
            .card-body { padding: var(--space-4); }
            h1 { font-size: var(--font-2xl); }
            h2 { font-size: var(--font-xl); }
            .btn-lg { min-height: 44px; }
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fadeInUp {
            animation: fadeInUp 0.4s ease forwards;
        }
        
        /* Theme Toggle */
        .theme-toggle {
            background: var(--bg-surface-hover);
            border: none;
            border-radius: var(--radius-md);
            padding: var(--space-2);
            cursor: pointer;
            transition: all var(--transition-fast);
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-primary);
        }
        
        .theme-toggle:hover {
            background: var(--border-light);
            transform: scale(1.05);
        }
        
        /* Dropdown */
        .dropdown-menu {
            background: var(--bg-surface);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            padding: var(--space-2) 0;
        }
        
        .dropdown-item {
            color: var(--text-primary);
            padding: var(--space-2) var(--space-4);
            font-size: var(--font-sm);
        }
        
        .dropdown-item:hover {
            background: var(--bg-surface-hover);
            color: var(--primary);
        }
        
        /* Scrollbar */
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: var(--bg-surface-hover); border-radius: var(--radius-sm); }
        ::-webkit-scrollbar-thumb { background: var(--primary); border-radius: var(--radius-sm); }
        
        /* Loading State */
        .btn-loading {
            pointer-events: none;
            opacity: 0.7;
        }
        
        .btn-loading i {
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        /* Link styles */
        a {
            color: var(--primary);
            text-decoration: none;
        }
        
        a:hover {
            color: var(--primary-dark);
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="<?= BASE_URL ?>/public/index.php?url=dashboard">
                <i class="fas fa-brain me-2"></i>
                <?= SITE_NAME ?>
            </a>
            <?php if(isset($_SESSION['user_id'])): ?>
            <div class="d-flex align-items-center gap-3">
                <button class="theme-toggle" onclick="toggleTheme()" aria-label="Toggle theme">
                    <i class="fas fa-moon"></i>
                </button>
                <div class="dropdown">
                    <button class="btn btn-outline dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle me-1"></i>
                        <span class="d-none d-sm-inline"><?= htmlspecialchars($_SESSION['user_name']) ?></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="<?= BASE_URL ?>/public/index.php?url=auth/logout">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </a></li>
                    </ul>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </nav>
    <main class="py-5">
        <div class="container">
            <?php if(isset($_SESSION['message'])): ?>
                <div class="alert alert-success alert-dismissible fade show animate-fadeInUp" role="alert">
                    <i class="fas fa-check-circle me-2"></i> <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['message']); ?>
            <?php endif; ?>
            <?php if(isset($_SESSION['error'])): ?>
                <div class="alert alert-danger alert-dismissible fade show animate-fadeInUp" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i> <?= $_SESSION['error'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>