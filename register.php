<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholar Sync</title>
    <link rel="stylesheet" href="assets/admin.css">
    <link rel="shortcut icon" href="./assets/logo.png" type="image/x-icon">
</head>

<body>
    <div class="main_container">
        <div class="container">
            <div class="right">
                <h2>Welcome Back!</h2>
                <p>To keep connected with us please login
                <p>with your personal info.</p>
                </p>
                <button><a href="login.php">SIGN IN</a></button>
            </div>
            <div class="left">
                <form action="include/register_back_end.php" method="POST" id="form">
                    <h1>Create Account</h1>
                    <p>Fill in your personal information.</p>
                    <span class="display_err">
                        <?php
                        if(isset($_GET['error'])){
                            if($_GET['error']=="user_exists"){
                                echo 'user already exists';
                            }
                            if($_GET['error']=="invalid_email"){
                                echo 'invalid email';
                            }
                       
                        }
                    ?>
                    </span>
                    <span class="display_suc">
                        <?php
                        if(isset($_GET['success'])){
                            if($_GET['success']=="inserted"){
                                echo 'registed!';
                            }
                        }
                    ?>
                    </span>
                    <div class="input_group">
                        <input type="text" name="name" id="name" placeholder="Enter your name">
                        <p></p>
                    </div>
                    <div class="input_group">
                        <input type="text" name="username" id="username" placeholder="Enter your username">
                        <p></p>
                    </div>
                    <div class="input_group">
                        <input type="text" name="email" id="email" placeholder="Enter your email">
                        <p></p>
                    </div>
                    <div class="input_group">
                        <input type="password" name="password" id="password" placeholder="Enter your password">
                        <p></p>
                    </div>
                    <div class="input_group">
                        <input type="password" name="c_password" id="c_password" placeholder="Enter your re-password">
                        <p></p>
                    </div>
                    <div class="input_group">
                        <button type="submit" name="submit">SIGN UP</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
    <script src="assets/register.js"></script>
</body>

</html>