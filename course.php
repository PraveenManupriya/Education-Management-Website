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
                <h2><a href="home.php">Dashboard</a> > <a href="course.php">Courses</a></h2>
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
                        <h3>Popular Course</h3>
                        <span>
                            <?php echo $most_popular_course; ?>
                        </span>
                    </div>
                    <?php
                }?>
                </div>

                <div class="home_body">
                    <div class="search">
                        <form action="#" method="POST">
                            <select name="level" id="level">
                                <option>Search by level</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>
                            </select>
                            <input type="text" name="search" id="search" placeholder="Search by course...">
                            <button type="submit" id="search_btn" name="search_btn">Search</button>
                            <a href="course.php"><i class='bx bx-refresh'></i></a>

                        </form>
                    </div>
                    <div class="add_student">
                        <a href="add_course.php">+ Course</a>
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
                                <th>Course Name</th>
                                <th>Description</th>
                                <th>Duration (Hours)</th>
                                <th>Instructor</th>
                                <th>Level</th>
                                <th>Fee</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            if (isset($_POST['search_btn'])) {
                                $search = $_POST['search'];
                                $level = $_POST['level'];
                                
                                $query = "SELECT * FROM courses WHERE name = '$search' OR level = '$level'";
                                $result = mysqli_query($conn, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['description'] . "</td>";
                                        echo "<td>" . $row['duration'] . "</td>";
                                        echo "<td>" . $row['instructor'] . "</td>";
                                        echo "<td>" . $row['level'] . "</td>";
                                        echo "<td>" . $row['fee'] . "</td>";
                                        echo "<td>
                                        <button class='update'><a href='course_update.php?update_id=" . $row['id'] . "'><i class='bx bx-edit'> Edit</i></a></button>
                                        <button class='delete'><a href='course_delete.php?delete_id=" . $row['id'] . "'><i class='bx bx-trash'> Delete</i></a></button>
                                        </td>";
                                        echo "</tr>";
                                    }
                                }
                            }else{
                                $query = "SELECT * FROM courses";
                                $result = mysqli_query($conn, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['description'] . "</td>";
                                        echo "<td>" . $row['duration'] . "</td>";
                                        echo "<td>" . $row['instructor'] . "</td>";
                                        echo "<td>" . $row['level'] . "</td>";
                                        echo "<td>" . $row['fee'] . "</td>";
                                        echo "<td>
                                        <button class='update'><a href='course_update.php?update_id=" . $row['id'] . "'><i class='bx bx-edit'> Edit</i></a></button>
                                        <button class='delete'><a href='course_delete.php?delete_id=" . $row['id'] . "'><i class='bx bx-trash'> Delete</i></a></button>
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