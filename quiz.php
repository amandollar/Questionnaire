<?php
include ('./partials/header.php');
include ('./conn/conn.php');
include ('./partials/modal.php');
?>

<div class="main">

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



    <!-- Quiz Management -->
    <div class="container mt-4">
        <nav>
            <div class="nav nav-pills nav-fill" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab">📝 Questions</button>
                <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab">📊 Results</button>
            </div>
        </nav>

        <div class="tab-content mt-4" id="nav-tabContent">
            <!-- Questions Tab -->
            <div class="tab-pane fade show active p-4" id="nav-home" role="tabpanel">
                <div class="d-flex justify-content-between mb-3">
                    <h4>📋 Manage Questions</h4>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addQuestionModal">
                        ➕ Add Question
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">📌 Quiz ID</th>
                                <th scope="col">❓ Question</th>
                                <th scope="col">✅ Correct Answer</th>
                                <th scope="col">⚙️ Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $stmt = $conn->prepare('SELECT * FROM `tbl_quiz`');
                            $stmt->execute();
                            $result = $stmt->fetchAll();

                            foreach ($result as $row) { ?>
                                <tr>
                                    <td><?= $row['tbl_quiz_id'] ?></td>
                                    <td><?= $row['quiz_question'] ?></td>
                                    <td><?= strtoupper($row['correct_answer']) ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" onclick="updateQuestion(<?= $row['tbl_quiz_id'] ?>)">✏️ Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteQuestion(<?= $row['tbl_quiz_id'] ?>)">🗑️ Delete</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Results Tab -->
            <div class="tab-pane fade p-4" id="nav-profile" role="tabpanel">
                <h4>📊 Student Results</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">🏅 Result ID</th>
                                <th scope="col">🎓 Student Name</th>
                                <th scope="col">📌 Year & Section</th>
                                <th scope="col">📊 Score</th>
                                <th scope="col">📅 Date Taken</th>
                                <th scope="col">⚙️ Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $stmt = $conn->prepare('SELECT * FROM `tbl_result`');
                            $stmt->execute();
                            $result = $stmt->fetchAll();

                            foreach ($result as $row) { ?>
                                <tr>
                                    <td><?= $row['tbl_result_id'] ?></td>
                                    <td><?= $row['quiz_taker'] ?></td>
                                    <td><?= $row['year_section'] ?></td>
                                    <td><?= $row['total_score'] ?></td>
                                    <td><?= $row['date_taken'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteResult(<?= $row['tbl_result_id'] ?>)">🗑️ Delete</button>
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

<?php include ('./partials/footer.php'); ?>

