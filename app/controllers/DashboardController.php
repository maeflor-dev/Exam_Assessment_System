<?php
class DashboardController extends Controller {
    
    public function index() {
        $this->requireLogin();
        
        if ($this->isAdmin()) {
            $examModel = new Exam();
            $exams = $examModel->getAllWithQuestionCount();
            
            $resultModel = new Result();
            $results = $resultModel->getAllResults();
            
            // Debug - uncomment to see what's being passed
            // echo "<pre>"; print_r($exams); echo "</pre>";
            
            $this->view('dashboard/admin', [
                'exams' => $exams,
                'results' => $results
            ]);
        } else {
            $examModel = new Exam();
            $exams = $examModel->getAllWithQuestionCount();
            
            $userModel = new User();
            $results = $userModel->getResults($_SESSION['user_id']);
            
            $this->view('dashboard/student', [
                'exams' => $exams,
                'results' => $results
            ]);
        }
    }
}
?>