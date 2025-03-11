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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="../assets/logo.png" type="image/x-icon">
</head>
<body>
    <?php include "navbar.php" ?>
    <?php include "profile.php" ?>
    <main>
    <section class="product-categories">
            <ul>
                <h2>Our Enrollment Students</h2>
            </ul>
    </section>
        <section class="products-grid">
        <?php
            $student_query = "SELECT * FROM enrollment ";
            $student_result = mysqli_query($conn, $student_query);
            if (mysqli_num_rows($student_result) > 0) {
                $count = 0;
                while ($row = mysqli_fetch_assoc($student_result)) {
            ?>       
                     
            <div class="product-item" >
                <img src="../assets/logo.png" >
                <div class="product-details">
                    <h3><?php echo $row["fname"]?></h3>
                    <p><?php echo $row["cname"]?></p>
                    <span>Status: <?php echo $row["status"]?></span><br>
                    <a href="#" class="btn">View Details</a>
                  
                </div>
            </div>
            <?php
                }
                 }
                ?>       

        </section>
    </main>
    <?php include "footer.php" ?>
    <script src="../assets/website.js"></script>
    
</body>

</html>