<?php
class Result extends Model {
    protected $table = 'results';
    
    public function saveResult($userId, $examId, $score, $totalQuestions) {
        // First check if already submitted
        $checkStmt = $this->db->prepare("SELECT id FROM results WHERE user_id = ? AND exam_id = ?");
        $checkStmt->execute([$userId, $examId]);
        
        if ($checkStmt->fetch()) {
            // Already submitted, don't insert again
            return false;
        }
        
        // Insert new result
        $stmt = $this->db->prepare("
            INSERT INTO results (user_id, exam_id, score, total_questions) 
            VALUES (?, ?, ?, ?)
        ");
        return $stmt->execute([$userId, $examId, $score, $totalQuestions]);
    }
    
    public function hasTakenExam($userId, $examId) {
        $stmt = $this->db->prepare("SELECT id FROM results WHERE user_id = ? AND exam_id = ?");
        $stmt->execute([$userId, $examId]);
        return $stmt->fetch() ? true : false;
    }
    
    public function getStudentResults($userId) {
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
    
    public function getTakenExamIds($userId) {
        $stmt = $this->db->prepare("SELECT exam_id FROM results WHERE user_id = ?");
        $stmt->execute([$userId]);
        $results = $stmt->fetchAll();
        return array_column($results, 'exam_id');
    }
    
    public function getExamResults($examId) {
        $stmt = $this->db->prepare("
            SELECT r.*, u.name, u.email, e.title 
            FROM results r 
            JOIN users u ON r.user_id = u.id 
            JOIN exams e ON r.exam_id = e.id 
            WHERE r.exam_id = ?
            ORDER BY r.submitted_at DESC
        ");
        $stmt->execute([$examId]);
        return $stmt->fetchAll();
    }
    
    public function getAllResults() {
        $stmt = $this->db->query("
            SELECT r.*, u.name, u.email, e.title as exam_title 
            FROM results r 
            JOIN users u ON r.user_id = u.id 
            JOIN exams e ON r.exam_id = e.id 
            ORDER BY r.submitted_at DESC
        ");
        return $stmt->fetchAll();
    }
    
    public function getUserResult($userId, $examId) {
        $stmt = $this->db->prepare("
            SELECT * FROM results WHERE user_id = ? AND exam_id = ?
        ");
        $stmt->execute([$userId, $examId]);
        return $stmt->fetch();
    }
}
?>