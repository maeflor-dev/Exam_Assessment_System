<?php require_once "../app/views/layouts/header.php"; ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Add Question to: <?= htmlspecialchars($exam['title']) ?></div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label>Question</label>
                        <textarea name="question" rows="3" class="form-control" required></textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Option A</label>
                            <input type="text" name="option1" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Option B</label>
                            <input type="text" name="option2" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Option C</label>
                            <input type="text" name="option3" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Option D</label>
                            <input type="text" name="option4" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label>Correct Answer</label>
                        <select name="correct_answer" class="form-control" required>
                            <option value="0">Option A</option>
                            <option value="1">Option B</option>
                            <option value="2">Option C</option>
                            <option value="3">Option D</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100">Add Question</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once "../app/views/layouts/footer.php"; ?>