<?php
include("include/connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholar Sync</title>
    <link rel="stylesheet" href="assets/admin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="./assets/logo.png" type="image/x-icon">
</head>

<body>
    <div class="main_container">
        <div class="home_container">
            <?php include "side_bar.php"?>

            <div class="home_right">
                <h2><a href="home.php">Dashboard</a></h2>
                <hr>
                <div class="home_cart">
                    <?php
                    $student_query = "SELECT * FROM student";
                    $student_result = mysqli_query($conn, $student_query);
                    if (mysqli_num_rows($student_result) > 0) {
                        $count = 0;
                        while ($row = mysqli_fetch_assoc($student_result)) {
                            $count ++;
                        }
                    ?>
                    <div class="cart">
                        <p><i class='bx bxs-user'></i></p>
                        <h3>Students</h3>
                        <p>
                            <?php echo $count?>
                        </p>
                    </div>
                    <?php
                    }?>
                    <?php
                    $course_query = "SELECT * FROM courses";
                    $course_result = mysqli_query($conn, $course_query);
                    if (mysqli_num_rows($course_result) > 0) {
                    $count = 0;
                    while ($row = mysqli_fetch_assoc($course_result)) {
                        $count ++;
                    }
                    ?>
                    <div class="cart">
                        <p><i class='bx bxs-graduation'></i></p>
                        <h3>Courses</h3>
                        <p>
                            <?php echo $count?>
                        </p>
                    </div>
                    <?php
                    }?>
                </div>

                <div class="home_cart">
                    <?php
                    $course_query = "SELECT * FROM enrollment";
                    $course_result = mysqli_query($conn, $course_query);
                    if (mysqli_num_rows($course_result) > 0) {
                    $count = 0;
                    while ($row = mysqli_fetch_assoc($course_result)) {
                        $count ++;
                    }
                    ?>
                    <div class="cart">
                        <p><i class='bx bxs-bookmark-plus'></i></p>
                        <h3>Enrollments</h3>
                        <p>
                            <?php echo $count?>
                        </p>
                    </div>
                    <?php
                    }?>
                    <?php
                    $course_query = "SELECT * FROM users";
                    $course_result = mysqli_query($conn, $course_query);
                    if (mysqli_num_rows($course_result) > 0) {
                    $count = 0;
                    while ($row = mysqli_fetch_assoc($course_result)) {
                        $count ++;
                    }
                    ?>
                    <div class="cart">
                        <p><i class='bx bxs-group'></i></p>
                        <h3>Users</h3>
                        <p>
                            <?php echo $count?>
                        </p>
                    </div>
                    <?php
                    }?>
                    <?php
                    $course_query = "SELECT * FROM marks";
                    $course_result = mysqli_query($conn, $course_query);
                    if (mysqli_num_rows($course_result) > 0) {
                    $count = 0;
                    while ($row = mysqli_fetch_assoc($course_result)) {
                        $count ++;
                    }
                    ?>
                    <div class="cart">
                        <p><i class='bx bxs-graduation'></i></p>
                        <h3>Students Marked</h3>
                        <p>
                            <?php echo $count?>
                        </p>
                    </div>
                    <?php
                    }?>

                </div>
            </div>
        </div>
    </div>
</body>

</html>