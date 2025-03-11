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
                <h2><a href="home.php">Dashboard</a> > <a href="enrollment.php">Enrollments</a></h2>
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
                <div class="home_body">
                    <div class="search">
                        <form action="#" method="POST">
                            <select name="status" id="status">
                                <option>Search by status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            <input type="text" name="search" id="search" placeholder="Search by student or course...">
                            <button type="submit" id="search_btn" name="search_btn">Search</button>
                            <a href="enrollment.php"><i class='bx bx-refresh'></i></a>

                        </form>
                    </div>
                    <div class="add_student">
                        <a href="add_enrollment.php">+ Enrollment</a>
                    </div>
                </div>
                <span class="display_suc">
                    <?php
                    if(isset($_GET['success'])){
                        if($_GET['success']=="updated"){
                            echo 'update successful';
                        }
                    }
                    ?>
                </span>
                <div class="table_container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Student Name</th>
                                <th>Course Name</th>
                                <th>Enrollment Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            if (isset($_POST['search_btn'])) {
                                $search = $_POST['search'];
                                $status = $_POST['status'];
                                
                                $query = "SELECT * FROM enrollment WHERE (fname = '$search' OR cname='$search') OR status = '$status'";
                                $result = mysqli_query($conn, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['fname'] . "</td>";
                                        echo "<td>" . $row['cname'] . "</td>";
                                        echo "<td>" . $row['date'] . "</td>";
                                        echo "<td>" . $row['status'] . "</td>";
                                        echo "<td>
                                        <button class='update'><a href='enrollment_update.php?update_id=" . $row['id'] . "'><i class='bx bx-edit'> Edit</i></a></button>
                                        <button class='delete'><a href='enrollment_delete.php?delete_id=" . $row['id'] . "'><i class='bx bx-trash'> Delete</i></a></button>
                                        </td>";
                                        echo "</tr>";
                                    }
                                }
                            }else{
                                $query = "SELECT * FROM enrollment";
                                $result = mysqli_query($conn, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['fname'] . "</td>";
                                        echo "<td>" . $row['cname'] . "</td>";
                                        echo "<td>" . $row['date'] . "</td>";
                                        echo "<td>" . $row['status'] . "</td>";
                                        echo "<td>
                                        <button class='update'><a href='enrollment_update.php?update_id=" . $row['id'] . "'><i class='bx bx-edit'> Edit</i></a></button>
                                        <button class='delete'><a href='enrollment_delete.php?delete_id=" . $row['id'] . "'><i class='bx bx-trash'> Delete</i></a></button>
                                        </td>";
                                        echo "</tr>";
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>