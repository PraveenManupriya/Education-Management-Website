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
            <div class="left">
                <form action="include/login_back_end.php" method="POST" id="form">
                    <h1>sign in</h1>
                    <p>use your account</p>
                    <span class="display_err">
                        <?php
                        if(isset($_GET['error'])){
                            if($_GET['error']=="notMatch"){
                                echo 'username or password does not matching!';
                            }
                        }
                    ?>
                    </span>
                    <div class="input_group">
                        <input type="text" name="username" id="username" placeholder="Enter your username or email">
                        <p></p>
                    </div>
                    <div class="input_group">
                        <input type="password" name="password" id="password" placeholder="Enter your password">
                        <p></p>
                    </div>
                    <p class="forgetPass"><a href="forgot_password.php">forgot your password?</a></p>
                    <div class="input_group">
                        <button type="submit" name="submit">SIGN IN</button>
                    </div>
                </form>
            </div>
            <div class="right">
                <h2>Hello, Friend!</h2>
                <p>Enter your personal details and start
                <p>journey with us.</p>
                </p>
                <button><a href="register.php">SIGN UP</a></button>
            </div>
        </div>

    </div>
    <script src="assets/login.js"></script>
</body>

</html>