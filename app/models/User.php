<?php
class User extends Model {
    protected $table = 'users';
    
    public function authenticate($email, $password) {
        if (empty($email) || empty($password)) {
            return false;
        }
        
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
    
    public function getResults($userId) {
        $stmt = $this->db->prepare("
            SELECT r.*, e.title as exam_title 
            FROM results r 
            JOIN exams e ON r.exam_id = e.id 
            WHERE r.user_id = ? 
            ORDER BY r.submitted_at DESC
        ");
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }
}
?>