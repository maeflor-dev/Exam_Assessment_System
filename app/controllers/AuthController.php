<?php
class AuthController extends Controller {
    
    public function login() {
        if ($this->isLoggedIn()) {
            $this->redirect('dashboard');
            return;
        }
        
        $errors = [];
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            
            // Validation
            if (empty($email)) {
                $errors['email'] = "Email address is required.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Please enter a valid email address.";
            }
            
            if (empty($password)) {
                $errors['password'] = "Password is required.";
            }
            
            if (empty($errors)) {
                $userModel = new User();
                $user = $userModel->authenticate($email, $password);
                
                if ($user) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['name'];
                    $_SESSION['user_email'] = $user['email'];
                    $_SESSION['role'] = $user['role'];
                    $this->redirect('dashboard');
                    return;
                } else {
                    $errors['general'] = "Invalid email or password.";
                }
            }
        }
        
        $this->view('auth/login', ['errors' => $errors]);
    }
    
    public function logout() {
        session_destroy();
        $this->redirect('auth/login');
    }
}
?>