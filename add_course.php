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
                <h2><a href="home.php">Dashboard</a> > <a href="course.php">Courses</a> > <a href="add_course.php">New
                        Course</a></h2>
                <hr>

                <div class="home_cart">
                    <?php
                    $course_query = "SELECT * FROM courses";
                    $course_result = mysqli_query($conn, $course_query);
                    if (mysqli_num_rows($course_result) > 0) {
                    $count = 0;
                    while ($row = mysqli_fetch_assoc($course_result)) {
                        $count ++;
                    }
                    ?>
                    <div class="cart1">
                        <h3>Total Courses</h3>
                        <span>
                            <?php echo $count?>
                        </span>
                    </div>
                    <?php
                }?>

                    <?php
                    $student_query = "SELECT SUM(duration) as Total_duration FROM courses";
                    $student_result = mysqli_query($conn, $student_query);

                    if (mysqli_num_rows($student_result) > 0) {
                    $row = mysqli_fetch_assoc($student_result);
                    $Total_duration = $row['Total_duration'];
                    ?>
                    <div class="cart1">
                        <h3>Total Course Hours</h3>
                        <span>
                            <?php echo $Total_duration; ?>
                        </span>
                    </div>
                    <?php
                }?>

                    <?php
                    $course_query = "SELECT cname, COUNT(cname) as count_name FROM enrollment GROUP BY cname ORDER BY count_name DESC LIMIT 1";
                    $course_result = mysqli_query($conn, $course_query);

                    if (mysqli_num_rows($course_result) > 0) {
                        $row = mysqli_fetch_assoc($course_result);
                        $most_popular_course = $row['cname'];
                    ?>
                    <div class="cart1">
                        <h3>Most Popular Course</h3>
                        <span>
                            <?php echo $most_popular_course; ?>
                        </span>
                    </div>
                    <?php
                }?>
                </div>

                <div class="add_form">
                    <div class="left">
                        <form action="include/add_course_back_end.php" method="POST" id="form">
                            <h1>New Course</h1>
                            <span class="display_err">
                                <?php
                                if(isset($_GET['error'])){
                                    if($_GET['error']=="course_exists"){
                                        echo 'course already exists';
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
                                    <input type="text" name="name" id="name" placeholder="Enter course name">
                                    <p></p>
                                </div>
                                <div class="input_group">
                                    <input type="text" name="description" id="description"
                                        placeholder="Enter course description">
                                    <p></p>
                                </div>
                                <div class="input_group">
                                    <input type="text" name="duration" id="duration"
                                        placeholder="Enter course duration (hours)">
                                    <p></p>
                                </div>

                            </div>
                            <div class="form_right">
                                <div class="input_group">
                                    <input type="text" name="instructor" id="instructor"
                                        placeholder="Enter course instructor">
                                    <p></p>
                                </div>
                                <div class="input_group">
                                    <select name="level" id="level">
                                        <option>Select level</option>
                                        <option value="Beginner">Beginner</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Advanced">Advanced</option>
                                    </select>
                                    <p></p>
                                </div>
                                <div class="input_group">
                                    <input type="text" name="fee" id="fee" placeholder="Enter course fee">
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
    <script src="assets/course.js"></script>
</body>

</html>