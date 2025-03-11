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
                <h2><a href="home.php">Dashboard</a> > <a href="student.php">Students</a> > <a href="#">Add Marks</a></h2>
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
                    <div class="cart1">
                        <h3>Total Students</h3>
                        <span>
                            <?php echo $count?>
                        </span>
                    </div>
                    <?php
                }?>

                    <?php
                    $student_query = "SELECT MAX(age) as max_age FROM student";
                    $student_result = mysqli_query($conn, $student_query);

                    if (mysqli_num_rows($student_result) > 0) {
                    $row = mysqli_fetch_assoc($student_result);
                    $max_age = $row['max_age'];
                    ?>
                    <div class="cart1">
                        <h3>Highest Age</h3>
                        <span>
                            <?php echo $max_age; ?>
                        </span>
                    </div>
                    <?php
                }?>

                    <?php
                    $student_query = "SELECT MIN(age) as min_age FROM student";
                    $student_result = mysqli_query($conn, $student_query);

                    if (mysqli_num_rows($student_result) > 0) {
                        $row = mysqli_fetch_assoc($student_result);
                        $min_age = $row['min_age'];
                    ?>
                    <div class="cart1">
                        <h3>Lowest Age</h3>
                        <span>
                            <?php echo $min_age; ?>
                        </span>
                    </div>
                    <?php
                }?>
                </div>

                <div class="add_form">
                    <div class="left">
                        <form action="include/add_marks_back_end.php" method="POST" id="form">
                            <h1>Add Marks</h1>
                            <span class="display_err">
                                <?php
                                    if(isset($_GET['error'])){
                                        if($_GET['error']=="not_course"){
                                            echo 'User is not taking this course';
                                        }
                                
                                    }
                                ?>
                            </span>
                            <div class="form_left">
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
                                <?php
                                    if(isset($_GET['id'])){
                                        $id = $_GET['id'];
                                    
                                        $query = "SELECT * FROM student WHERE id = '$id'";
                                        $result = mysqli_query($conn,$query);
                                        if(mysqli_num_rows($result)>0){
                                            $row = mysqli_fetch_assoc($result);
                                    
                                        
                                    ?>
                                <div class="input_group">
                                    <input type="text" name="name" id="name" value="<?php echo $row['fname'];?>">
                                    <p></p>
                                    <?php
                                        }
                                    }?>
                                </div>
                                <div class="input_group">
                                    <input type="text" name="mark" id="mark" placeholder="Enter mark">
                                    <p></p>
                                </div>
                            </div>
                            <div class="form_right">

                                <div class="input_group">
                                    <select name="status" id="status">
                                        <option>Select Status</option>
                                        <option value="Pass">Pass</option>
                                        <option value="Fail">Fail</option>
                                    </select>
                                    <p></p>
                                </div>
                                <div class="input_group">
                                    <input type="text" name="remark" id="remark" placeholder="Enter remark">
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
</body>
<script src="./assets/marks.js"></script>

</html>