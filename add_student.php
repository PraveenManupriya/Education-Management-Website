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
                <h2><a href="home.php">Dashboard</a> > <a href="student.php">Students</a> > <a
                        href="add_student.php">New Student</a></h2>
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
                        <form action="include/add_student_back_end.php" method="POST" id="form" enctype="multipart/form-data">
                            <h1>New Student</h1>
                            
                            <span class="display_err">
                                <?php
                                if(isset($_GET['error'])){
                                    if($_GET['error']=="student_exists"){
                                        echo 'student already exists';
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
                                    <input type="text" name="fname" id="fname" placeholder="Enter your full name">
                                    <p></p>
                                </div>
                                <div class="input_group">
                                    <input type="text" name="nic" id="nic" placeholder="Enter your NIC number">
                                    <p></p>
                                </div>
                                <div class="input_group">
                                    <select name="gender" id="gender">
                                        <option>Select gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <p></p>
                                </div>
                            </div>
                            <div class="form_right">
                                <div class="input_group">
                                    <input type="text" name="age" id="age" placeholder="Enter your age">
                                    <p></p>
                                </div>
                                <div class="input_group">
                                    <input type="date" name="dob" id="dob">
                                    <p></p>
                                </div>
                                <div class="input_group">
                                    <input type="text" name="contact_no" id="contact_no"
                                        placeholder="Enter your phone number">
                                    <p></p>
                                </div>
                                <div class="input_group">
                                    <input type="file" name="imgFile" id="imgFile">
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
    <script src="./assets/student.js"></script>
</body>

</html>