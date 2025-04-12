<?php
include("../conn/conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['result'])) {
    $resultID = $_GET['result'];

    try {
        // Step 1: Delete the result
        $stmt = $conn->prepare("DELETE FROM tbl_result WHERE tbl_result_id = :resultID");
        $stmt->bindParam(':resultID', $resultID, PDO::PARAM_INT);
        $stmt->execute();

        // Step 2: Check if the table is empty, then reset AUTO_INCREMENT
        $countStmt = $conn->query("SELECT COUNT(*) FROM tbl_result");
        $count = $countStmt->fetchColumn();

        if ($count == 0) {
            $conn->query("ALTER TABLE tbl_result AUTO_INCREMENT = 1");
        }

        // Redirect back to the quiz page
        header("Location: http://localhost/online-quiz-system/quiz.php");
        exit();

    } catch (PDOException $e) {
        echo 'Database Error: ' . $e->getMessage();
    }
} else {
    echo "Invalid request. Missing result ID.";
}
?>
