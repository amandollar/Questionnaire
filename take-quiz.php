<?php
include ('./partials/header.php');
include ('./conn/conn.php');
include ('./partials/modal.php');
?>

<div class="main">

    <!-- Quiz Section -->
    <div class="container mt-4 text-dark">
        <div class="card shadow-lg p-4">
            <h3 class="text-center">🧠 Multiple Choice Quiz</h3>
            <p class="text-center text-muted">Enter the correct answer (A, B, C, or D) in the input field.</p>

            <div class="questions">
                <?php
                $stmt = $conn->prepare('SELECT * FROM `tbl_quiz`');
                $stmt->execute();
                $result = $stmt->fetchAll();

                foreach ($result as $row) {
                    $quizID = $row['tbl_quiz_id'];
                    $quizQuestion = $row['quiz_question'];
                    $optionA = $row['option_a'];
                    $optionB = $row['option_b'];
                    $optionC = $row['option_c'];
                    $optionD = $row['option_d'];
                    $correctAnswer = $row['correct_answer'];
                ?>
                <div class="card shadow-sm p-3 mb-3">
                    <h5><?= $quizID ?>. <?= $quizQuestion ?></h5>
                    <ul class="list-group">
                        <li class="list-group-item">A.<?= $optionA ?></li>
                        <li class="list-group-item">B.<?= $optionB ?></li>
                        <li class="list-group-item">C.<?= $optionC ?></li>
                        <li class="list-group-item">D.<?= $optionD ?></li>
                    </ul>
                    <div class="input-group mt-3">
                        <span class="input-group-text">Answer:</span>
                        <input type="text" class="form-control text-uppercase" maxlength="1" data-index="<?= $quizID ?>">
                    </div>
                </div>
                <?php
                }
                ?>
            </div>

            <button type="button" class="btn btn-primary btn-lg w-100 mt-3" id="submitAnswer">
                🚀 Submit Answers
            </button>
        </div>
    </div>
</div>

<!-- Pass Quiz Data to JavaScript -->
<?php
$stmt = $conn->prepare('SELECT * FROM `tbl_quiz`');
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<script>';
echo 'var quizData = ' . json_encode($result) . ';';
echo '</script>';
?>

<script>
    document.getElementById("submitAnswer").addEventListener("click", function() {
        var questions = document.querySelectorAll(".card");
        var correctAnswers = 0;

        questions.forEach(function(question, index) {
            var answerInput = question.querySelector("input");
            if (answerInput) {
                var userAnswer = answerInput.value.toUpperCase();
                var correctAnswer = quizData[index]?.correct_answer || '';

                if (userAnswer === correctAnswer) {
                    correctAnswers++;
                    question.classList.add("border-success");
                }
            }
        });

        // Show the result modal
        $("#resultModal").modal("show");

        // Display total score in the modal
        $("#totalScore").val(correctAnswers);
    });
</script>

<?php include ('./partials/footer.php'); ?>
