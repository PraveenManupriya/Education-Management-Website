
<?php
session_start();
include 'connection.php';

    if(isset($_POST['submit'])){
        $name = $_POST['name'];     
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password']; 

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../register.php?error=invalid_email");
            exit();
        }

        $query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        $result = mysqli_query($conn,$query);

        if(mysqli_num_rows($result)>0){
            header('location:../register.php?error=user_exists');
            exit();
        }else{
            $query = "INSERT INTO users (name,username,email,password) VALUES('$name','$username','$email','$password')";
            $result = mysqli_query($conn,$query);

            if($result){
                header('location:../register.php?success=inserted');
                exit();
                
            }
        }
   
        
    }

    
?>