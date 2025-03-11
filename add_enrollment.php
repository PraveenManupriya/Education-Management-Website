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
    <link rel="shortcut icon" href="./assets/logo.png" type="image/x-icon">
</head>

<body>
    <div class="main_container">
        <div class="home_container">
            <?php include "side_bar.php"?>

            <div class="home_right">
                <h2><a href="home.php">Dashboard</a> > <a href="enrollment.php">Enrollments</a> > <a
                        href="add_enrollment.php">New Enrollment</a></h2>
                <hr>
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
                    <div class="cart1">

                        <h3>Total Enrollments</h3>
                        <span>
                            <?php echo $count?>
                        </span>
                    </div>
                    <?php
                }?>

                    <?php
                    $student_query = "SELECT * FROM enrollment WHERE status = 'active'";
                    $student_result = mysqli_query($conn, $student_query);
                    if (mysqli_num_rows($student_result) > 0) {
                    $count = 0;
                    while ($row = mysqli_fetch_assoc($student_result)) {
                        $count ++;
                    }
                    ?>
                    <div class="cart1">

                        <h3>Active Enrollments</h3>
                        <span>
                            <?php echo $count?>
                        </span>
                    </div>
                    <?php
                }?>

                    <?php
                    $course_query = "SELECT * FROM enrollment WHERE status = 'inactive'";
                    $course_result = mysqli_query($conn, $course_query);
                    if (mysqli_num_rows($course_result) > 0) {
                    $count = 0;
                    while ($row = mysqli_fetch_assoc($course_result)) {
                        $count ++;
                    }
                    ?>
                    <div class="cart1">
                        <h3>Inactive Enrollments</h3>
                        <span>
                            <?php echo $count?>
                        </span>
                    </div>
                    <?php
                }?>

                </div>

                <div class="add_form">
                    <div class="left">
                        <form action="include/add_enrollment_back_end.php" method="POST" id="form">
                            <h1>New Enrollments</h1>
                            <span class="display_err">
                                <?php
                                if(isset($_GET['error'])){
                                    if($_GET['error']=="enrollment_exists"){
                                        echo 'enrollment already exists';
                                    }
                                }
                                ?>
                            </span>
                            <span class="display_suc">
                                <?php
                                if(isset($_GET['success'])){
                                    if($_GET['success']=="inserted"){
                                        echo 'successfully!!';
                                    }
                                }
                                ?>
                            </span>
                            <div class="form_left">
                                <div class="input_group">
                                    <select name="student" id="student">
                                        <option>Select Student</option>
                                        <?php
                                        $student_query = "SELECT * FROM student";
                                        $student_result = mysqli_query($conn, $student_query);
                                        while ($row = mysqli_fetch_assoc($student_result)) {
                                        ?>
                                        <option>
                                            <?php echo $row['fname']?>
                                        </option>
                                        <?php
                                        }?>


                                    </select>
                                    <p></p>
                                </div>
                                <div class="input_group">
                                    <select name="course" id="course">
                                        <option>Select Course</option>
                                        <?php
                                        $student_query = "SELECT * FROM courses";
                                        $student_result = mysqli_query($conn, $student_query);
                                        while ($row = mysqli_fetch_assoc($student_result)) {
                                        ?>
                                        <option>
                                            <?php echo $row['name']?>
                                        </option>
                                        <?php
                                        }?>
                                    </select>
                                    <p></p>
                                </div>
                            </div>
                            <div class="form_right">
                                <div class="input_group">
                                    <input type="date" name="date" id="date">
                                    <p></p>
                                </div>
                                <div class="input_group">
                                    <select name="status" id="status">
                                        <option>Select Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    <p></p>
                                </div>

                            </div>
                            <div class="input_group">
                                <button type="submit" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="assets/enrollment.js"></script>
</body>

</html>