<?php
session_start();
include 'connection.php'; 

if (isset($_POST['submit'])) {
    $email =$_POST['email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($email) || empty($new_password) || empty($confirm_password)) {
        header("Location: ../forgot_password.php?error=empty");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../forgot_password.php?error=invalid_email");
        exit();
    }

    if ($new_password === $confirm_password){

        $query = "UPDATE users SET password='$new_password' WHERE email='$email'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header("Location: ../forgot_password.php?success=updated");
        } else {
            header("Location: ../forgot_password.php?error=failed");
        }
    } else {
        header("Location: ../forgot_password.php?error=password_mismatch");
    }
}

?>
