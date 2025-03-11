<?php
include "../include/connection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholar Sync</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="../assets/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/admin.css">
    <link rel="stylesheet" href="style.css">
</head>
<style>

</style>

<body>
    <?php include "navbar.php" ?>
    <?php include "profile.php" ?>
    <main>
        <section class="product-categories">
            <ul>
                <h2>Student Exam Results</h2>
            </ul>
        </section>

        <div class="mark-container">
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
                        <a href="mark.php"><i class='bx bx-refresh'></i></a>

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
                                    echo "<td>" . $row['course'] . "</td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['mark'] . "</td>";
                                    echo "<td>" . $row['status'] . "</td>";
                                    echo "<td>" . $row['remark'] . "</td>";
                                    echo "</tr>";
                                }
                            }
                        } else {
                            $query = "SELECT * FROM marks";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['course'] . "</td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['mark'] . "</td>";
                                    echo "<td>" . $row['status'] . "</td>";
                                    echo "<td>" . $row['remark'] . "</td>";
                                    echo "</tr>";
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <?php include "footer.php" ?>
    <script src="../assets/website.js"></script>
</body>

</html>