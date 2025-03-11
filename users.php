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
                <h2><a href="home.php">Dashboard</a> > <a href="users.php">Users</a></h2>
                <hr>

                <div class="home_cart">
                    <?php
                    $student_query = "SELECT * FROM users";
                    $student_result = mysqli_query($conn, $student_query);
                    if (mysqli_num_rows($student_result) > 0) {
                    $count = 0;
                    while ($row = mysqli_fetch_assoc($student_result)) {
                        $count ++;
                    }
                    ?>
                    <div class="cart1">
                        <h3>Total Users</h3>
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
                            <input type="text" name="search" id="search" placeholder="Search by email...">
                            <button type="submit" id="search_btn" name="search_btn">Search</button>
                            <a href="users.php"><i class='bx bx-refresh'></i></a>

                        </form>
                    </div>
                </div>

                <div class="table_container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_POST['search_btn'])) {
                                $search = $_POST['search'];
                                $query = "SELECT * FROM users WHERE email = '$search'";
                                $result = mysqli_query($conn, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['type'] . "</td>";
                                        echo "<td>
                                                <button class='delete'><a href='user_delete.php?delete_id=" . $row['id'] . "'><i class='bx bx-trash'> Delete</i></a></button>
                                            </td>";
                                        echo "</tr>";
                                    }
                                }
                            }else{
                                $query = "SELECT * FROM users";
                                $result = mysqli_query($conn, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['type'] . "</td>";
                                        echo "<td>
                                        <button class='delete'><a href='user_delete.php?delete_id=" . $row['id'] . "'><i class='bx bx-trash'> Delete</i></a></button>
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