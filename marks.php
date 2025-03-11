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
                <h2><a href="home.php">Dashboard</a> > <a href="marks.php">Marks</a></h2>
                <hr>

                <div class="home_cart">
                <?php
                    $student_query = "SELECT * FROM marks";
                    $student_result = mysqli_query($conn, $student_query);
                    if (mysqli_num_rows($student_result) > 0) {
                    $count = 0;
                    while ($row = mysqli_fetch_assoc($student_result)) {
                        $count ++;
                    }
                    ?>
                    <div class="cart1">
                        <h3>Marked Students</h3>
                        <span>
                            <?php echo $count?>
                        </span>
                    </div>
                    <?php
                }?>

                <?php
                    $student_query = "SELECT MAX(mark) as max_mark FROM marks";
                    $student_result = mysqli_query($conn, $student_query);

                    if (mysqli_num_rows($student_result) > 0) {
                    $row = mysqli_fetch_assoc($student_result);
                    $max_mark = $row['max_mark'];
                    ?>
                    <div class="cart1">
                        <h3>Highest Mark</h3>
                        <span>
                            <?php echo $max_mark; ?>
                        </span>
                    </div>
                    <?php
                }?>

                <?php
                    $student_query = "SELECT MIN(mark) as min_mark FROM marks";
                    $student_result = mysqli_query($conn, $student_query);

                    if (mysqli_num_rows($student_result) > 0) {
                        $row = mysqli_fetch_assoc($student_result);
                        $min_mark = $row['min_mark'];
                    ?>
                    <div class="cart1">
                        <h3>Lowest Mark</h3>
                        <span>
                            <?php echo $min_mark; ?>
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
                                <option value="Pass">Pass</option>
                                <option value="Fail">Fail</option>
                            </select>
                            <input type="text" name="search" id="search" placeholder="Search by full name...">
                            <button type="submit" id="search_btn" name="search_btn">Search</button>
                            <a href="marks.php"><i class='bx bx-refresh'></i></a>

                        </form>
                    </div>
                </div>
                <div class="table_container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Course Name</th>
                                <th>Student Name</th>
                                <th>Marks</th>
                                <th>Status</th>
                                <th>Remark</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            if (isset($_POST['search_btn'])) {
                                $search = $_POST['search'];
                                $status = $_POST['status'];
                                
                                $query = "SELECT * FROM marks WHERE name = '$search' OR status = '$status'";
                                $result = mysqli_query($conn, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['course']. "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['mark'] . "</td>";
                                        echo "<td>" . $row['status'] . "</td>";
                                        echo "<td>" . $row['remark'] . "</td>";
                                        echo "<td>
                                                <button class='delete'><a href='marks_delete.php?delete_id=" . $row['id'] . "'><i class='bx bx-trash'> Delete</i></a></button>
                                            </td>";
                                        echo "</tr>";
                                    }
                                }
                            }else{
                                    $query = "SELECT * FROM marks";
                                    $result = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['course']. "</td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['mark'] . "</td>";
                                            echo "<td>" . $row['status'] . "</td>";
                                            echo "<td>" . $row['remark'] . "</td>";
                                            echo "<td>
                                            <button class='delete'><a href='marks_delete.php?delete_id=" . $row['id'] . "'><i class='bx bx-trash'> Delete</i></a></button>
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