<?php
include("../include/connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholar Sync</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="../assets/logo.png" type="image/x-icon">
</head>

<body>
    <?php include "navbar.php" ?>
    <?php include "profile.php" ?>

    <div class="home-page" id="home">
        <div class="home-container">
            <div class="home-wapper">
                <div class="home-top">
                    <h1>Our Education Center Website</h1>
                    <h2>Scholar Sync</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate voluptates sunt atque
                        reiciendis</p>
                    <button class="btn">Show Now</button>
                </div>
                <div class="home-img">
                    <img src="../assets/logo.png" alt="logo">
                </div>
            </div>
        </div>
    </div>


    <div class="category-section">
        <div class="category-top">
            <span class="liner"></span>
            <span class="category-text">Our Details</span>
        </div>
        <div class="category-wapper">
            <a href="student.php">
                <div class="category">
                    <div class="category-img">
                        <i class='bx bxs-user'></i>
                    </div>
                    <div class="category-desc">
                        <?php
                        $student_query = "SELECT * FROM student";
                        $student_result = mysqli_query($conn, $student_query);
                        if (mysqli_num_rows($student_result) > 0) {
                            $count = 0;
                            while ($row = mysqli_fetch_assoc($student_result)) {
                                $count++;
                            }
                        ?>

                            <span class="category-type">Students</span>
                            <span class="category-number"><?php echo $count ?></span>
                        <?php
                        } ?>

                    </div>
                </div>
            </a>

            <a href="course.php">
                <div class="category">
                    <div class="category-img">
                        <i class='bx bxs-graduation'></i>
                    </div>
                    <div class="category-desc">
                        <?php
                        $student_query = "SELECT * FROM courses";
                        $student_result = mysqli_query($conn, $student_query);
                        if (mysqli_num_rows($student_result) > 0) {
                            $count = 0;
                            while ($row = mysqli_fetch_assoc($student_result)) {
                                $count++;
                            }
                        ?>
                            <span class="category-type">Courses</span>
                            <span class="category-number"><?php echo $count ?></span>
                        <?php
                        } ?>
                    </div>
                </div>
            </a>

            <a href="enrollment.php">
                <div class="category">
                    <div class="category-img">
                        <i class='bx bxs-bookmark-plus'></i>
                    </div>
                    <div class="category-desc">
                        <?php
                        $student_query = "SELECT * FROM enrollment";
                        $student_result = mysqli_query($conn, $student_query);
                        if (mysqli_num_rows($student_result) > 0) {
                            $count = 0;
                            while ($row = mysqli_fetch_assoc($student_result)) {
                                $count++;
                            }
                        ?>
                            <span class="category-type">Enrollments</span>
                            <span class="category-number"><?php echo $count ?></span>
                        <?php
                        } ?>
                    </div>
                </div>
            </a>

        </div>
    </div>

    <div class="product-banner">
        <div class="row-section">
            <img src="../assets/images/ad.png" alt="ad">
        </div>
        <div class="content-section">
            <div class="category-top">
                <span class="liner"></span>
                <span class="category-text">Assistant Director</span>
            </div>
            <h1>Director Name </h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus dolor quia labore doloribus magnam, ea deleniti.</p>
        </div>
    </div>


    <div class="cart-section" id="student">
        <div class="cart-section-top">
            <div class="cart-section-container">
                <div class="cart-category-top">
                    <span class="liner"></span>
                    <span class="category-text">Student</span>
                </div>
                <h3>Students associated with our institution</h3>
            </div>

        </div>

        <div class="cart-container">
            <ul>
                <?php
                $student_query = "SELECT * FROM student LIMIT 4";
                $student_result = mysqli_query($conn, $student_query);
                if (mysqli_num_rows($student_result) > 0) {
                    $count = 0;
                    while ($row = mysqli_fetch_assoc($student_result)) {
                ?>

                        <li class="cart">
                            <div class="cart-left">
                                <img src="../student_img/<?php echo $row['images'];?>" alt="student image">
                            </div>
                            <div class="cart-text">
                                <h1><?php echo $row["fname"]; ?></h1>

                                <p><?php echo $row["dob"]; ?></p>

                                <div class="cart-button">
                                    <span><?php echo $row["gender"]; ?></span>
                                    <span><?php echo $row["age"]; ?></span>
                                </div>
                            </div>
                        </li>
                <?php
                    }
                }
                ?>



            </ul>
        </div>
        <div class="slideshow-container" data-slideshow="all">
            <a href="student.php"><button class="slideshow-button next-button">Show
                    <i class="fa-solid fa-chevron-right"></i>
                </button></a>
        </div>
    </div>


    <div class="product-banner">
        <div class="row-section">
            <?php

            $course_query = "SELECT cname, fee, description, COUNT(cname) as count_name FROM courses  INNER JOIN enrollment  ON cname = cname GROUP BY cname ORDER BY count_name DESC LIMIT 1";
            $course_result = mysqli_query($conn, $course_query);

            if (mysqli_num_rows($course_result) > 0) {
                $row = mysqli_fetch_assoc($course_result);
                $most_popular_course = $row['cname'];
                $course_fee = $row['fee'];
                $course_description = $row['description'];
            ?>
                <div class="cart1">
                    <h3>Popular Course</h3>
                    <span>
                        <?php echo $most_popular_course; ?>
                    </span>
                </div>
        </div>
        <div class="content-section">
            <div class="category-top">
                <span class="liner"></span>
                <span class="category-text">Scholar Sync</span>
            </div>
            <h1><?php echo $most_popular_course; ?></h1>
            <a href="course.php"><button class="buy-now-btn">Show Now</button></a>
        </div>
        <?php
            } ?>
    </div>



    <div class="cart-section" id="course">
        <div class="cart-section-top">
            <div class="cart-section-container">
                <div class="cart-category-top">
                    <span class="liner"></span>
                    <span class="category-text">Course</span>
                </div>
                <h3>Our Courses</h3>
            </div>

        </div>

        <div class="cart-container">
            <ul>
                <?php
                $student_query = "SELECT * FROM courses LIMIT 4";
                $student_result = mysqli_query($conn, $student_query);
                if (mysqli_num_rows($student_result) > 0) {
                    $count = 0;
                    while ($row = mysqli_fetch_assoc($student_result)) {
                ?>

                        <li class="cart">
                            <div class="cart-left">
                                <img src="../assets/logo.png" alt="student image">
                            </div>
                            <div class="cart-text">
                                <p>Instructor: <?php echo $row["instructor"]; ?></p>
                                <h1><?php echo $row["name"]; ?></h1>
                                <span>Course Fee: <?php echo $row["fee"]; ?></span><br>
                                <span>Duration: <?php echo $row["duration"]; ?> hour</span>
                            </div>
                        </li>
                <?php
                    }
                }
                ?>



            </ul>
        </div>
        <div class="slideshow-container" data-slideshow="all">
            <a href="course.php"><button class="slideshow-button next-button">Show
                    <i class="fa-solid fa-chevron-right"></i>
                </button></a>
        </div>
    </div>



    <?php include "footer.php" ?>
</body>
<script src="../assets/website.js"></script>

</html>