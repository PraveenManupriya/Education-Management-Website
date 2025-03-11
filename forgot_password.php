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
                <h2>Changed Password!</h2>
                <p>try again, please login with your personal information.</p>
                <button><a href="login.php">Go Back</a></button>
            </div>
            <div class="left">
                <form action="include/forgot_password_back_end.php" method="POST" id="form">
                    <h1>Forget Password</h1>
                    <p>Enter a new password below to change your password.</p>
                    <span class="display_err">
                        <?php
                        if(isset($_GET['error'])){
                            if($_GET['error']=="failed"){
                                echo 'updated failed!';
                            }
                            if($_GET['error']=="password_mismatch"){
                                echo 'password does not matching!';
                            }
                            if($_GET['error']=="invalid_email"){
                                echo 'invalid email!';
                            }
                            if($_GET['error']=="empty"){
                                echo ' inputs field is required ';
                            }
                            
                        }
                    ?>
                    </span>
                    <span class="display_suc">
                        <?php
                        if(isset($_GET['success'])){
                            if($_GET['success']=="updated"){
                                echo 'password changed!';
                            }
                        }
                    ?>
                    </span>
                    <div class="input_group">
                        <input type="text" id="email" name="email" placeholder="Enter email" />
                        <p></p>
                    </div>
                    <div class="input_group">
                        <input type="password" id="new_password" name="new_password" placeholder="Enter new password" />
                        <p></p>
                    </div>
                    <div class="input_group">
                        <input type="password" id="confirm_password" name="confirm_password"
                            placeholder="Confirm new password" />
                    </div>
                    <div class="input_group">
                        <button type="submit" name="submit">Change</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</body>

</html>