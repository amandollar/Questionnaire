<?php
include ('./partials/header.php');
include ('./conn/conn.php');
include ('./partials/modal.php');
?>

<div class="main bg-gray-100 min-h-screen">


    <!-- Quiz Management -->
    <div class="container mx-auto mt-8 px-6">
        <!-- Tabs -->
        <div class="flex space-x-4">
            <button class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition-all duration-300 shadow" id="nav-home-tab" data-toggle="tab" data-target="#nav-home">
                📝 Questions
            </button>
            <button class="bg-gray-500 text-white px-6 py-3 rounded-md hover:bg-gray-600 transition-all duration-300 shadow" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile">
                📊 Results
            </button>
        </div>

        <div class="mt-6 bg-white p-8 rounded-lg shadow-lg">
            <!-- Questions Tab -->
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home">
                    <div class="flex justify-between items-center mb-6">
                        <h4 class="text-2xl font-semibold">📋 Manage Questions</h4>
                        <button class="bg-green-500 text-white px-5 py-2 rounded-md hover:bg-green-600 transition-all duration-300 shadow-md" data-toggle="modal" data-target="#addQuestionModal">
                            ➕ Add Question
                        </button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border border-gray-300 rounded-lg shadow-md">
                            <thead class="bg-blue-700 text-white text-lg">
                                <tr>
                                    <th class="px-5 py-3">📌 Quiz ID</th>
                                    <th class="px-5 py-3">❓ Question</th>
                                    <th class="px-5 py-3">✅ Correct Answer</th>
                                    <th class="px-5 py-3 text-center">⚙️ Actions</th>

                                </tr>
                            </thead>
                            <tbody class="bg-white text-gray-700">
                                <?php 
                                $stmt = $conn->prepare('SELECT * FROM `tbl_quiz`');
                                $stmt->execute();
                                $result = $stmt->fetchAll();
                                
                                foreach ($result as $row) { ?>
                                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition-all duration-200">
                                        <td class="px-5 py-4 text-center"> <?= $row['tbl_quiz_id'] ?> </td>
                                        <td class="px-5 py-4"> <?= $row['quiz_question'] ?> </td>
                                        <td class="px-5 py-4 text-center font-semibold"> <?= strtoupper($row['correct_answer']) ?> </td>
                                        <td class="px-5 py-4 text-center">
                                            <button class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition-all duration-300 shadow-md" onclick="updateQuestion(<?= $row['tbl_quiz_id'] ?>)">
                                                ✏️ Edit
                                            </button>
                                            <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition-all duration-300 shadow-md" onclick="deleteQuestion(<?= $row['tbl_quiz_id'] ?>)">
                                                🗑️ Delete
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Results Tab -->
                <div class="tab-pane fade" id="nav-profile">
                    <h4 class="text-2xl font-semibold mb-6">📊 Student Results</h4>
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border border-gray-300 rounded-lg shadow-md">
                            <thead class="bg-blue-700 text-white text-lg">
                                <tr>
                                    <th class="px-5 py-3">🏅 Result ID</th>
                                    <th class="px-5 py-3">🎓 Student Name</th>
                                    <th class="px-5 py-3">📌 Year & Section</th>
                                    <th class="px-5 py-3">📊 Score</th>
                                    <th class="px-5 py-3">📅 Date Taken</th>
                                    <th class="px-5 py-3">⚙️ Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white text-gray-700">
                                <?php 
                                $stmt = $conn->prepare('SELECT * FROM `tbl_result`');
                                $stmt->execute();
                                $result = $stmt->fetchAll();
                                
                                foreach ($result as $row) { ?>
                                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition-all duration-200">
                                        <td class="px-5 py-4 text-center"> <?= $row['tbl_result_id'] ?> </td>
                                        <td class="px-5 py-4"> <?= $row['quiz_taker'] ?> </td>
                                        <td class="px-5 py-4 text-center"> <?= $row['year_section'] ?> </td>
                                        <td class="px-5 py-4 text-center font-semibold"> <?= $row['total_score'] ?> </td>
                                        <td class="px-5 py-4 text-center"> <?= $row['date_taken'] ?> </td>
                                        <td class="px-5 py-4 text-center">
                                            <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition-all duration-300 shadow-md" onclick="deleteResult(<?= $row['tbl_result_id'] ?>)">
                                                🗑️ Delete
                                            </button>
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
