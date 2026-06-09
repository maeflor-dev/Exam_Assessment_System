<?php
class Log extends Model {
    protected $table = 'logs';
    
    public function addLog($userId, $action, $details = null) {
        $stmt = $this->db->prepare("
            INSERT INTO logs (user_id, action, details) 
            VALUES (?, ?, ?)
        ");
        return $stmt->execute([$userId, $action, $details]);
    }
}
?>