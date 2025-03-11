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
                <h2><a href="home.php">Dashboard</a> > <a href="student.php">Students</a> > <a href="#">Update Student</a></h2>
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
                <?php
                    if(isset($_GET['update_id'])){
                        $update_id = $_GET['update_id'];
                    
                        $query = "SELECT * FROM student WHERE id = '$update_id'";
                        $result = mysqli_query($conn,$query);
                        if(mysqli_num_rows($result)>0){
                            $row = mysqli_fetch_assoc($result);
                     
                        
                ?>
                <div class="add_form">
                    <div class="left">
                        <form action="include/student_update_back_end.php" method="POST" id="form">
                            <h1>Update Student</h1>
                            <p>Fill in your update personal information.</p>
                            <span class="display_err">
                                <?php
                                if(isset($_GET['error'])){
                                    if($_GET['error']=="empty_fields"){
                                        echo 'inputs field is required';
                                    }  
                                    if($_GET['error']=="invalid_nic"){
                                        echo 'NIC number is invalid, must be 12 characters';
                                    } 
                                    if($_GET['error']=="invalid_phone"){
                                        echo 'Contact number must be 10 characters';
                                    } 
                                }
                                ?>
                            </span>


                            <div class="form_left">
                                <input type="hidden" name="id" id="id" value="<?php echo $row['id'];?>">
                                <div class="input_group">
                                    <input type="text" name="fname" id="fname" value="<?php echo $row['fname'];?>">
                                    <p></p>
                                </div>
                                <div class="input_group">
                                    <input type="text" name="nic" id="nic" value="<?php echo $row['nic'];?>">
                                    <p></p>
                                </div>
                                <div class="input_group">
                                    <select name="gender" id="gender">
                                        <option value="male" <?php if ($row['gender']=='male' ) echo 'selected' ; ?>
                                            >Male</option>
                                        <option value="female" <?php if ($row['gender']=='female' ) echo 'selected' ; ?>
                                            >Female</option>
                                    </select>

                                    <p></p>
                                </div>
                            </div>
                            <div class="form_right">
                                <div class="input_group">
                                    <input type="text" name="age" id="age" value="<?php echo $row['age'];?>">
                                    <p></p>
                                </div>
                                <div class="input_group">
                                    <input type="date" name="dob" id="dob" value="<?php echo $row['dob'];?>">
                                    <p></p>
                                </div>
                                <div class="input_group">
                                    <input type="text" name="contact_no" id="contact_no"
                                        value="<?php echo $row['contact_no'];?>">
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