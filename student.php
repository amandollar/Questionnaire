<?php
include ('./partials/header.php');
include ('./conn/conn.php');
include ('./partials/modal.php');
?>

<div class="main">



    <!-- Student Dashboard -->
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="card shadow-lg text-center p-4 border-0" style="max-width: 500px;">
            <h2 class="mb-3">👨‍🎓 Welcome, Student!</h2>
            <div class="border-top border-primary w-50 mx-auto mb-3"></div>
            <p class="mb-4">
                This is your student area where you can take quizzes. Your results will be sent to the teacher after submission.
            </p>
            <a href="./take-quiz.php" class="btn btn-primary btn-lg">📝 Take Quiz <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</div>

<?php include ('./partials/footer.php'); ?>
