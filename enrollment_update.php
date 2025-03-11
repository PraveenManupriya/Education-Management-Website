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
                <h2><a href="home.php">Dashboard</a> > <a href="enrollment.php">Enrollments</a> > <a href="#">Update
                        Enrollment</a></h2>
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
                <?php
                    if(isset($_GET['update_id'])){
                        $update_id = $_GET['update_id'];
                    
                        $query = "SELECT * FROM enrollment WHERE id = '$update_id'";
                        $result = mysqli_query($conn,$query);
                        if(mysqli_num_rows($result)>0){
                            $row = mysqli_fetch_assoc($result);
                    
                        
                ?>
                <div class="add_form">
                    <div class="left">
                        <form action="include/enrollment_update_back_end.php" method="POST" id="form">
                            <h1>Update Enrollments</h1>
                            <span class="display_err">
                                <?php
                                if(isset($_GET['error'])){
                                    if($_GET['error']=="empty_fields"){
                                        echo 'inputs field is required ';
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
                                <input type="hidden" name="id" id="id" value="<?php echo $row['id'];?>">
                                <div class="input_group">
                                    <input type="text" name="fname" id="fname" value="<?php echo $row['fname'];?>">
                                    <p></p>
                                </div>
                                <div class="input_group">
                                    <input type="text" name="cname" id="cname" value="<?php echo $row['cname'];?>">
                                    <p></p>
                                </div>
                            </div>

                            <div class="form_right">
                                <div class="input_group">
                                    <input type="date" name="date" id="date" value="<?php echo $row['date'];?>">
                                    <p></p>
                                </div>
                                <div class="input_group">
                                    <select name="status" id="status">
                                        <option value="Active" <?php if ($row['status']=='Active' ) echo 'selected' ; ?>
                                            >Active</option>
                                        <option value="Inactive" <?php if ($row['status']=='Inactive' ) echo 'selected'
                                            ; ?>>Inactive</option>
                                    </select>
                                    <p></p>
                                </div>
                                <?php
                                    }
                                }?>
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

</html>