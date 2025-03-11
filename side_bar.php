<div class="home_left">
    <div class="user_info">
        <img src="assets/logo.png" alt="">
        <p>Welcome,</p>
        <h4>
            <?php echo $_SESSION['username'];?>
        </h4>
        <nav class="sidebar">
            <ul>
                <li><a href="home.php"><i class='bx bxs-dashboard'></i>Home</a></li>
                <li><a href="student.php"><i class='bx bxs-user'></i>Students</a></li>
                <li><a href="course.php"><i class='bx bxs-graduation'></i>Courses</a></li>
                <li><a href="enrollment.php"><i class='bx bxs-bookmark-plus'></i>Enrollments</a></li>
                <li><a href="marks.php"><i class='bx bxs-bar-chart-square'></i>Marks</a></li>
                <li><a href="users.php"><i class='bx bxs-group'></i>Users</a></li>
            </ul>
        </nav>
        <a href="include/logout.php" id="logout"><i class='bx bxs-log-out'></i>Logout</a>
    </div>
</div>