<?php
include("../conn/conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['question'])) {
    $questionID = $_GET['question'];

    try {
        // Step 1: Delete the question
        $stmt = $conn->prepare("DELETE FROM tbl_quiz WHERE tbl_quiz_id = :questionID");
        $stmt->bindParam(':questionID', $questionID, PDO::PARAM_INT);
        $stmt->execute();

        // Step 2: Reset AUTO_INCREMENT only if table is not empty
        $countStmt = $conn->query("SELECT COUNT(*) FROM tbl_quiz");
        $count = $countStmt->fetchColumn();

        if ($count == 0) {
            $conn->query("ALTER TABLE tbl_quiz AUTO_INCREMENT = 1");
        }

        // Redirect back to the quiz page
        header("Location: http://localhost/online-quiz-system/quiz.php");
        exit();

    } catch (PDOException $e) {
        echo 'Database Error: ' . $e->getMessage();
    }
} else {
    echo "Invalid request. Missing question ID.";
}
?>
