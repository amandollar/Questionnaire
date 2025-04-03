<?php
include ('./partials/header.php');
include ('./conn/conn.php');
include ('./partials/modal.php');
?>

<div class="main bg-gray-100 min-h-screen">

    <nav class="bg-blue-600 shadow-lg py-3">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="#" class="text-white text-2xl font-bold flex items-center">
                📚 QUESTIONAIRRE
            </a>

            <!-- Mobile Menu Button -->
            <button class="lg:hidden text-white focus:outline-none" id="menu-btn">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <!-- Logout Button -->
            <div class="hidden lg:block">
                <a href="./index.php" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">
                    🚪 Log out
                </a>
            </div>
        </div>
    </nav>

    <!-- Quiz Management -->
    <div class="container mx-auto mt-6 px-4">
        <nav>
            <div class="flex space-x-4">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg focus:outline-none" id="nav-home-tab" data-toggle="tab" data-target="#nav-home">📝 Questions</button>
                <button class="bg-gray-500 text-white px-4 py-2 rounded-lg focus:outline-none" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile">📊 Results</button>
            </div>
        </nav>

        <div class="mt-6 bg-white p-6 rounded-lg shadow-lg">
            <!-- Questions Tab -->
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home">
                    <div class="flex justify-between mb-4">
                        <h4 class="text-xl font-bold">📋 Manage Questions</h4>
                        <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600" data-toggle="modal" data-target="#addQuestionModal">➕ Add Question</button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="px-4 py-2">📌 Quiz ID</th>
                                    <th class="px-4 py-2">❓ Question</th>
                                    <th class="px-4 py-2">✅ Correct Answer</th>
                                    <th class="px-4 py-2">⚙️ Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <?php 
                                $stmt = $conn->prepare('SELECT * FROM `tbl_quiz`');
                                $stmt->execute();
                                $result = $stmt->fetchAll();
                                
                                foreach ($result as $row) { ?>
                                    <tr class="border-b border-gray-300">
                                        <td class="px-4 py-2 text-center"> <?= $row['tbl_quiz_id'] ?> </td>
                                        <td class="px-4 py-2"> <?= $row['quiz_question'] ?> </td>
                                        <td class="px-4 py-2 text-center"> <?= strtoupper($row['correct_answer']) ?> </td>
                                        <td class="px-4 py-2 text-center">
                                            <button class="bg-yellow-500 text-white px-3 py-1 rounded-lg hover:bg-yellow-600" onclick="updateQuestion(<?= $row['tbl_quiz_id'] ?>)">✏️ Edit</button>
                                            <button class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600" onclick="deleteQuestion(<?= $row['tbl_quiz_id'] ?>)">🗑️ Delete</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Results Tab -->
                <div class="tab-pane fade" id="nav-profile">
                    <h4 class="text-xl font-bold mb-4">📊 Student Results</h4>
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="px-4 py-2">🏅 Result ID</th>
                                    <th class="px-4 py-2">🎓 Student Name</th>
                                    <th class="px-4 py-2">📌 Year & Section</th>
                                    <th class="px-4 py-2">📊 Score</th>
                                    <th class="px-4 py-2">📅 Date Taken</th>
                                    <th class="px-4 py-2">⚙️ Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <?php 
                                $stmt = $conn->prepare('SELECT * FROM `tbl_result`');
                                $stmt->execute();
                                $result = $stmt->fetchAll();
                                
                                foreach ($result as $row) { ?>
                                    <tr class="border-b border-gray-300">
                                        <td class="px-4 py-2 text-center"> <?= $row['tbl_result_id'] ?> </td>
                                        <td class="px-4 py-2"> <?= $row['quiz_taker'] ?> </td>
                                        <td class="px-4 py-2 text-center"> <?= $row['year_section'] ?> </td>
                                        <td class="px-4 py-2 text-center"> <?= $row['total_score'] ?> </td>
                                        <td class="px-4 py-2 text-center"> <?= $row['date_taken'] ?> </td>
                                        <td class="px-4 py-2 text-center">
                                            <button class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600" onclick="deleteResult(<?= $row['tbl_result_id'] ?>)">🗑️ Delete</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ('./partials/footer.php'); ?>
