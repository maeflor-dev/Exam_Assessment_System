<?php
class Exam extends Model {
    protected $table = 'exams';
    
    public function getQuestions($examId) {
        $stmt = $this->db->prepare("SELECT * FROM questions WHERE exam_id = ? ORDER BY id");
        $stmt->execute([$examId]);
        return $stmt->fetchAll();
    }
    
    public function getAllWithQuestionCount() {
        $stmt = $this->db->query("
            SELECT e.*, COUNT(q.id) as question_count 
            FROM exams e 
            LEFT JOIN questions q ON e.id = q.exam_id 
            GROUP BY e.id
            ORDER BY e.created_at DESC
        ");
        $results = $stmt->fetchAll();
        
        // Debug - uncomment to see if exams are being fetched
        // error_log("Exams found: " . count($results));
        
        return $results;
    }
    
    public function createExam($title, $timeLimit) {
        $stmt = $this->db->prepare("INSERT INTO exams (title, time_limit) VALUES (?, ?)");
        if ($stmt->execute([$title, $timeLimit])) {
            return $this->db->lastInsertId();
        }
        return false;
    }
    
    public function addQuestion($examId, $question, $options, $correctAnswer) {
        $stmt = $this->db->prepare("
            INSERT INTO questions (exam_id, question, options, correct_answer) 
            VALUES (?, ?, ?, ?)
        ");
        return $stmt->execute([$examId, $question, json_encode($options), $correctAnswer]);
    }
}
?>