<!-- Add Quiz Modal -->
<div class="modal fade" id="addQuestionModal" tabindex="-1" aria-labelledby="addQuiz" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="addQuestion">➕ Add Question</h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form action="./endpoint/add-question.php" method="POST">
                    <div class="mb-3">
                        <label for="quizQuestion" class="form-label">📝 Question</label>
                        <input type="text" class="form-control form-control-lg rounded-pill" id="quizQuestion" name="quiz_question" placeholder="Enter your question">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="optionA" class="form-label">Option A</label>
                            <input type="text" class="form-control rounded-pill" id="optionA" name="option_a" placeholder="Option A">
                        </div>
                        <div class="col-md-6">
                            <label for="optionB" class="form-label">Option B</label>
                            <input type="text" class="form-control rounded-pill" id="optionB" name="option_b" placeholder="Option B">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="optionC" class="form-label">Option C</label>
                            <input type="text" class="form-control rounded-pill" id="optionC" name="option_c" placeholder="Option C">
                        </div>
                        <div class="col-md-6">
                            <label for="optionD" class="form-label">Option D</label>
                            <input type="text" class="form-control rounded-pill" id="optionD" name="option_d" placeholder="Option D">
                        </div>
                    </div>

                    <div class="mt-3">
                        <label for="correctAnswer" class="form-label">✅ Correct Answer (Letter Only)</label>
                        <input type="text" class="form-control rounded-pill text-uppercase" id="correctAnswer" name="correct_answer" maxlength="1" placeholder="A, B, C, or D">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">❌ Cancel</button>
                        <button type="submit" class="btn btn-primary rounded-pill">💾 Save Question</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Quiz Modal -->
<div class="modal fade" id="updateQuestionModal" tabindex="-1" aria-labelledby="addQuiz" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title">✏️ Update Question</h5>
                <button type="button" class="close text-dark" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form action="./endpoint/update-question.php" method="POST">
                    <input type="hidden" id="updateQuizID" name="tbl_quiz_id">
                    
                    <div class="mb-3">
                        <label for="updateQuestion" class="form-label">📝 Question</label>
                        <input type="text" class="form-control form-control-lg rounded-pill" id="updateQuestion" name="quiz_question" placeholder="Update question">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="updateOptionA" class="form-label"> Option A</label>
                            <input type="text" class="form-control rounded-pill" id="updateOptionA" name="option_a" placeholder="Update Option A">
                        </div>
                        <div class="col-md-6">
                            <label for="updateOptionB" class="form-label"> Option B</label>
                            <input type="text" class="form-control rounded-pill" id="updateOptionB" name="option_b" placeholder="Update Option B">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="updateOptionC" class="form-label">Option C</label>
                            <input type="text" class="form-control rounded-pill" id="updateOptionC" name="option_c" placeholder="Update Option C">
                        </div>
                        <div class="col-md-6">
                            <label for="updateOptionD" class="form-label">Option D</label>
                            <input type="text" class="form-control rounded-pill" id="updateOptionD" name="option_d" placeholder="Update Option D">
                        </div>
                    </div>

                    <div class="mt-3">
                        <label for="updateCorrectAnswer" class="form-label">✅ Correct Answer (Letter Only)</label>
                        <input type="text" class="form-control rounded-pill text-uppercase" id="updateCorrectAnswer" name="correct_answer" maxlength="1">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">❌ Cancel</button>
                        <button type="submit" class="btn btn-warning rounded-pill">💾 Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Result Modal -->
<div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="addQuiz" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">🏆 Quiz Result</h5>
            </div>
            <div class="modal-body p-4">
                <form action="./endpoint/add-result.php" method="POST">
                    <div class="mb-3">
                        <label for="quizTaker" class="form-label">👤 Student Fullname</label>
                        <input type="text" class="form-control form-control-lg rounded-pill" id="quizTaker" name="quiz_taker">
                    </div>

                    <div class="mb-3">
                        <label for="yearSection" class="form-label">📚 Year and Section</label>
                        <input type="text" class="form-control rounded-pill" id="yearSection" name="year_section">
                    </div>

                    <div class="mb-3">
                        <label for="totalScore" class="form-label">📊 Total Score</label>
                        <input type="text" class="form-control rounded-pill text-center" id="totalScore" name="total_score" readonly>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success rounded-pill">✅ Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
