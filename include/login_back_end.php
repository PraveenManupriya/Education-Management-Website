
<?php
session_start();
include "connection.php";

if(isset($_POST['submit']))
{   
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$username' OR username='$username' AND password = '$password'";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0)
    {
        if($row = mysqli_fetch_assoc($result))
        {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            if ($row['type'] == 'admin') {
                header('Location: ../home.php');  
            } else {
                header('Location: ../website/index1.php');  
            }
            exit();

        }
    }
    else
    {
        header('location:../login.php?error=notMatch');
        exit();
    }
}
?>
