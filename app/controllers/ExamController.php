<?php
class ExamController extends Controller {
    
    public function create() {
        $this->requireAdmin();
        $this->view('exam/create');
    }
    
    public function createComplete() {
        $this->requireAdmin();
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('dashboard');
            return;
        }
        
        $title = trim($_POST['title'] ?? '');
        $timeLimit = (int)($_POST['time_limit'] ?? 0);
        $questions = $_POST['questions'] ?? [];
        
        // Validate
        if (empty($title)) {
            $_SESSION['error'] = "Exam title is required.";
            $this->redirect('exam/create');
            return;
        }
        
        if ($timeLimit <= 0) {
            $_SESSION['error'] = "Time limit must be greater than 0.";
            $this->redirect('exam/create');
            return;
        }
        
        if (empty($questions)) {
            $_SESSION['error'] = "At least one question is required.";
            $this->redirect('exam/create');
            return;
        }
        
        $examModel = new Exam();
        
        // Create exam
        $examId = $examModel->createExam($title, $timeLimit);
        
        if (!$examId) {
            $_SESSION['error'] = "Failed to create exam.";
            $this->redirect('exam/create');
            return;
        }
        
        // Add questions
        $successCount = 0;
        foreach ($questions as $q) {
            $options = [
                trim($q['option_a']),
                trim($q['option_b']),
                trim($q['option_c']),
                trim($q['option_d'])
            ];
            $correctAnswer = (int)$q['correct'];
            
            if ($examModel->addQuestion($examId, trim($q['text']), $options, $correctAnswer)) {
                $successCount++;
            }
        }
        
        $_SESSION['message'] = "✓ Exam created! Added {$successCount} questions.";
        $this->redirect('dashboard');
    }
    
    public function addQuestion($examId) {
        $this->requireAdmin();
        
        $examModel = new Exam();
        $exam = $examModel->find($examId);
        
        if (!$exam) {
            $_SESSION['error'] = "Exam not found.";
            $this->redirect('dashboard');
            return;
        }
        
        $errors = [];
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $question = trim($_POST['question'] ?? '');
            $option1 = trim($_POST['option1'] ?? '');
            $option2 = trim($_POST['option2'] ?? '');
            $option3 = trim($_POST['option3'] ?? '');
            $option4 = trim($_POST['option4'] ?? '');
            $correctAnswer = (int)($_POST['correct_answer'] ?? 0);
            
            $options = [$option1, $option2, $option3, $option4];
            
            if (empty($question)) {
                $errors['question'] = "Question is required.";
            }
            foreach ($options as $opt) {
                if (empty($opt)) {
                    $errors['options'] = "All options are required.";
                    break;
                }
            }
            
            if (empty($errors)) {
                if ($examModel->addQuestion($examId, $question, $options, $correctAnswer)) {
                    $_SESSION['message'] = "Question added successfully!";
                    $this->redirect('dashboard');
                    return;
                }
            }
        }
        
        $this->view('exam/add-question', ['exam' => $exam, 'errors' => $errors]);
    }
    
    public function take($id) {
        $this->requireLogin();
        
        if ($this->isAdmin()) {
            $this->redirect('dashboard');
            return;
        }
        
        $examModel = new Exam();
        $exam = $examModel->find($id);
        $questions = $examModel->getQuestions($id);
        
        if (!$exam) {
            $_SESSION['error'] = "Exam not found.";
            $this->redirect('dashboard');
            return;
        }
        
        if (empty($questions)) {
            $_SESSION['error'] = "No questions found.";
            $this->redirect('dashboard');
            return;
        }
        
        $resultModel = new Result();
        if ($resultModel->hasTakenExam($_SESSION['user_id'], $id)) {
            $_SESSION['error'] = "You have already taken this exam.";
            $this->redirect('dashboard');
            return;
        }
        
        $this->view('exam/take', [
            'exam' => $exam,
            'questions' => $questions
        ]);
    }
    
    public function submit() {
        $this->requireLogin();
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('dashboard');
            return;
        }
        
        $examId = (int)($_POST['exam_id'] ?? 0);
        $answers = $_POST['answers'] ?? [];
        $tabSwitches = (int)($_POST['tab_switches'] ?? 0);
        
        if ($tabSwitches > 0) {
            $logModel = new Log();
            $logModel->addLog($_SESSION['user_id'], 'tab_switch', "Switched tabs {$tabSwitches} times");
        }
        
        $examModel = new Exam();
        $questions = $examModel->getQuestions($examId);
        
        $score = 0;
        foreach ($questions as $question) {
            $userAnswer = $answers[$question['id']] ?? null;
            if ($userAnswer !== null && (int)$userAnswer === (int)$question['correct_answer']) {
                $score++;
            }
        }
        
        $resultModel = new Result();
        $resultModel->saveResult($_SESSION['user_id'], $examId, $score, count($questions));
        
        $percentage = ($score / count($questions)) * 100;
        
        $this->view('exam/result', [
            'score' => $score,
            'total' => count($questions),
            'percentage' => round($percentage, 2)
        ]);
    }
}
?>