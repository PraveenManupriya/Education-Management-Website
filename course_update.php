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
                <h2><a href="home.php">Dashboard</a> > <a href="course.php">Courses</a> > <a href="#">Update Course</a>
                </h2>
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
                <?php
                    if(isset($_GET['update_id'])){
                        $update_id = $_GET['update_id'];
                    
                        $query = "SELECT * FROM courses WHERE id = '$update_id'";
                        $result = mysqli_query($conn,$query);
                        if(mysqli_num_rows($result)>0){
                            $row = mysqli_fetch_assoc($result);
                     
                        
                ?>
                <div class="add_form">
                    <div class="left">
                        <form action="include/course_update_back_end.php" method="POST" id="form">
                            <h1>Update Course</h1>
                            <p>Fill in update course personal information.</p>
                            <span class="display_err">
                                <?php
                                if(isset($_GET['error'])){
                                    if($_GET['error']=="empty_fields"){
                                        echo 'inputs field is required';
                                    }
                                }
                                ?>
                            </span>

                            <div class="form_left">
                                <input type="hidden" name="id" id="id" value="<?php echo $row['id'];?>">
                                <div class="input_group">
                                    <input type="text" name="name" id="name" value="<?php echo $row['name'];?>">
                                    <p></p>
                                </div>
                                <div class="input_group">
                                    <input type="text" name="description" id="description"
                                        value="<?php echo $row['description'];?>">
                                    <p></p>
                                </div>
                                <div class="input_group">
                                    <input type="text" name="duration" id="duration"
                                        value="<?php echo $row['duration'];?>">
                                    <p></p>
                                </div>

                            </div>
                            <div class="form_right">
                                <div class="input_group">
                                    <input type="text" name="instructor" id="instructor"
                                        value="<?php echo $row['instructor'];?>">
                                    <p></p>
                                </div>
                                <div class="input_group">
                                    <select name="level" id="level">
                                        <option value="Beginner" <?php if ($row['level']=='Beginner' ) echo 'selected' ;
                                            ?>>Beginner</option>
                                        <option value="Intermediate" <?php if ($row['level']=='Intermediate' )
                                            echo 'selected' ; ?>>Intermediate</option>
                                        <option value="Advanced" <?php if ($row['level']=='Advanced' ) echo 'selected' ;
                                            ?>>Advanced</option>
                                    </select>
                                    <p></p>
                                </div>
                                <div class="input_group">
                                    <input type="text" name="fee" id="fee" value="<?php echo $row['fee'];?>">
                                    <p></p>
                                </div>

                            </div>
                            <div class="input_group">
                                <button type="submit" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                    <?php
                        }
                    }?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>