<?php
include("../conn/conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['quiz_taker'], $_POST['year_section'])) {
        $quizTaker = $_POST['quiz_taker'];
        $yearSection = $_POST['year_section'];
        $totalScore = $_POST['total_score'];
        $dateTaken = date("Y-m-d H:i:s"); 

        try {
            $stmt = $conn->prepare("INSERT INTO tbl_result (quiz_taker, year_section, total_score, date_taken) VALUES (:quiz_taker, :year_section, :total_score, :date_taken)");

            $stmt->bindParam(':quiz_taker', $quizTaker);
            $stmt->bindParam(':year_section', $yearSection);
            $stmt->bindParam(':total_score', $totalScore);
            $stmt->bindParam(':date_taken', $dateTaken);

            $stmt->execute();

            echo "
            <script>
                alert('Submitted Successfully!');
                window.location.href = 'http://localhost/online-quiz-system/student.php';
            </script>
            ";
            exit();
        } catch (PDOException $e) {
            echo 'Database Error: ' . $e->getMessage();
        }
    } else {
        echo "
        <script>
            alert('Please fill in both the title and content fields.');
            window.location.href = 'http://localhost/online-quiz-system/take-quiz.php';
        </script>
        ";
    }
}
?>