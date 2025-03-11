<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<nav>
    <div class="navbar">
        <div class="navbar-logo">
            <img src="../assets/logo.png" alt="logo">
        </div>
        <div class="navbar-link">
            <ul id="links">
                <li><a href="index1.php">Home</a></li>
                <li><a href="student.php">Students</a></li>
                <li><a href="course.php">Courses</a></li>
                <li><a href="enrollment.php">Enrollment</a></li>
                <li><a href="mark.php">Marks</a></li>
            </ul>
            <div class="navbar-tools">
                <a href="#" class="user-link" >
                    <i class='bx bx-user'></i>
                </a>
                <a href="#" id="themeToggle">
                    <i class="fa-regular fa-lightbulb" id="lightIcon"></i>
                    <i class="fa-regular fa-moon" id="darkIcon" style="display: none;"></i>
                </a>
            </div>
            <span class="menu-icon" id="menuIcon" onclick="toggleMenu()">
                <i class="fa-solid fa-bars"></i>
            </span>
        </div>
    </div>
</nav>
