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
                <h2><a href="home.php">Dashboard</a> > <a href="student.php">Students</a></h2>
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

                <div class="home_body">
                    <div class="search">
                        <form action="#" method="POST">
                            <select name="gender" id="gender">
                                <option>Search by gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <input type="text" name="search" id="search" placeholder="Search by NIC...">
                            <button type="submit" id="search_btn" name="search_btn">Search</button>
                            <a href="student.php"><i class='bx bx-refresh'></i></a>

                        </form>
                    </div>
                    <div class="add_student">
                        <a href="add_student.php">+ Student</a>
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
                                <th>Full Name</th>
                                <th>NIC</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Date Of Birth</th>
                                <th>Contact</th>
                                <th>Marks</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            if (isset($_POST['search_btn'])) {
                                $search = $_POST['search'];
                                $gender = $_POST['gender'];
                                
                                $query = "SELECT * FROM student WHERE nic = '$search' OR gender = '$gender'";
                                $result = mysqli_query($conn, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['fname']. "</td>";
                                        echo "<td>" . $row['nic'] . "</td>";
                                        echo "<td>" . $row['gender'] . "</td>";
                                        echo "<td>" . $row['age'] . "</td>";
                                        echo "<td>" . $row['dob'] . "</td>";
                                        echo "<td>" . $row['contact_no'] . "</td>";
                                        echo "<td><button class='view'><a href='add_marks.php?id=" . $row['id'] . "'><i class='bx bxs-bullseye'> Mark</i></a></button></td>";
                                        echo "<td>
                                                <button class='update'><a href='student_update.php?update_id=" . $row['id'] . "'><i class='bx bx-edit'> Edit</i></a></button>
                                                <button class='delete'><a href='student_delete.php?delete_id=" . $row['id'] . "'><i class='bx bx-trash'> Delete</i></a></button>
                                            </td>";
                                        echo "</tr>";
                                    }
                                }
                            }else{
                                    $query = "SELECT * FROM student";
                                    $result = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['fname']. "</td>";
                                            echo "<td>" . $row['nic'] . "</td>";
                                            echo "<td>" . $row['gender'] . "</td>";
                                            echo "<td>" . $row['age'] . "</td>";
                                            echo "<td>" . $row['dob'] . "</td>";
                                            echo "<td>" . $row['contact_no'] . "</td>";
                                            echo "<td><button class='view'><a href='add_marks.php?id=" . $row['id'] . "'><i class='bx bxs-bullseye'> Mark</i></a></button></td>";
                                            echo "<td>
                                                    <button class='update'><a href='student_update.php?update_id=" . $row['id'] . "'><i class='bx bx-edit'> Edit</i></a></button>
                                                    <button class='delete'><a href='student_delete.php?delete_id=" . $row['id'] . "'><i class='bx bx-trash'> Delete</i></a></button>
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