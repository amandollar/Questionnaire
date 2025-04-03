<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionnaire Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }
        .btn-hover {
            transition: all 0.3s ease;
            transform: translateY(0);
        }
        .btn-hover:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .pulse {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-800 min-h-screen flex items-center justify-center text-white font-sans">

    <div class="container mx-auto px-4 text-center animate__animated animate__fadeIn">
        <div class="mb-8">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-4 drop-shadow-xl animate__animated animate__fadeInDown">
                 Questionnaire Portal
            </h1>
            <p class="text-xl text-blue-100 mb-2 max-w-2xl mx-auto animate__animated animate__fadeIn animate__delay-1s">
                Interactive learning platform connecting students and educators
            </p>
            <div class="w-24 h-1 bg-white bg-opacity-50 mx-auto mt-6 rounded-full animate__animated animate__fadeIn animate__delay-1s"></div>
        </div>

        <div class="glass-card p-8 md:p-10 max-w-md mx-auto pulse animate__animated animate__zoomIn animate__delay-1s">
            <h3 class="text-2xl md:text-3xl font-bold mb-6 text-white">
                Welcome! Who are you?
            </h3>
            <div class="flex flex-col space-y-5">
                <a href="student.php" class="btn-hover bg-gradient-to-r from-blue-500 to-blue-600 text-white py-4 px-6 rounded-xl text-lg font-bold shadow-lg transition-all duration-300 hover:from-blue-600 hover:to-blue-700 hover:shadow-xl flex items-center justify-center">
                    <span class="mr-3 text-2xl">🎓</span> 
                    <span>I'm a Student</span>
                    <span class="ml-3 text-xl">→</span>
                </a>
                <a href="teacher.php" class="btn-hover bg-gradient-to-r from-purple-500 to-purple-600 text-white py-4 px-6 rounded-xl text-lg font-bold shadow-lg transition-all duration-300 hover:from-purple-600 hover:to-purple-700 hover:shadow-xl flex items-center justify-center">
                    <span class="mr-3 text-2xl">👨‍🏫</span>
                    <span>I'm a Teacher</span>
                    <span class="ml-3 text-xl">→</span>
                </a>
            </div>
            
            <div class="mt-8 pt-6 border-t border-white border-opacity-20">
                <p class="text-blue-100 text-sm">
                    New here? <a href="#" class="text-white font-medium underline hover:text-blue-200">Learn how it works</a>
                </p>
            </div>
        </div>
        
        <div class="mt-12 text-blue-100 text-sm animate__animated animate__fadeIn animate__delay-2s">
            © 2025 Questionnaire Platform. All rights reserved.
        </div>
    </div>

</body>
</html>