
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<div class="submenu-wrapper" >
    <div class="submenu" id="submenu">
        <div class="user-info">
            <img src="../assets/logo.png" alt="user image">
            <h3><?php echo $_SESSION['username'];?></h3>
        </div>
        <hr>
        <a href="#" class="submenu-link" id="edit_profile">
            <i class="fa-solid fa-user"></i>
            <p>Edit Profile</p>
            <span> > </span>
        </a>
        <a href="#" class="submenu-link"> 
            <i class="fa-solid fa-envelope"></i>
            <p>Message</p>
            <span> > </span>
        </a>
        <a href="#" class="submenu-link"> 
            <i class="fa-solid fa-gear"></i>
            <p>Settings</p>
            <span> > </span>
        </a>
        <a href="#" class="submenu-link"> 
            <i class="fa-solid fa-circle-question"></i>
            <p>Help</p>
            <span> > </span>
        </a>
        <a href="../include/logout.php" class="submenu-link"> 
            <i class="fa-solid fa-right-from-bracket"></i>
            <p>Logout</p>
            <span> > </span>
        </a>
    </div>
</div>