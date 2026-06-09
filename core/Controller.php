<?php
class Controller {
    protected function view($view, $data = []) {
        extract($data);
        $viewPath = "../app/views/{$view}.php";
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            die("View not found: {$view}");
        }
    }
    
    protected function redirect($url) {
        header("Location: " . BASE_URL . "/public/index.php?url=" . $url);
        exit();
    }
    
    protected function isLoggedIn() {
        return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
    }
    
    protected function isAdmin() {
        return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }
    
    protected function requireLogin() {
        if (!$this->isLoggedIn()) {
            $this->redirect('auth/login');
            exit();
        }
    }
    
    protected function requireAdmin() {
        $this->requireLogin();
        if (!$this->isAdmin()) {
            $this->redirect('dashboard');
            exit();
        }
    }
}
?>