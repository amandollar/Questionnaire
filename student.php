<?php
include ('./partials/header.php');
include ('./conn/conn.php');
include ('./partials/modal.php');
?>

<div class="main">
    <!-- Navbar -->
    
<nav class="bg-blue-600 shadow-lg">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-3">
            <!-- Logo -->
            <a href="#" class="text-white text-2xl font-bold flex items-center">
                📚 QUESTIONAIRRE
            </a>

            <!-- Mobile Menu Button -->
            <button class="lg:hidden text-white focus:outline-none" id="menu-btn">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" 
                     viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <!-- Logout Button (Aligned to the Right) -->
            <div class="ml-auto hidden lg:block">
                <a href="./index.php" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">
                    🚪 Log out
                </a>
            </div>
        </div>
    </div>
</nav>


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
