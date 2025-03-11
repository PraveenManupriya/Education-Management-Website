<?php
    include "connection.php";

    if(isset($_POST['submit']))
    {
        $fname = $_POST['student'];     
        $cname = $_POST['course'];
        $date = $_POST['date'];
        $status = $_POST['status'];
        
        $check = "SELECT * FROM enrollment WHERE fname='$fname' and cname='$cname'";
        $check_result = mysqli_query($conn,$check);
        if(mysqli_num_rows($check_result) > 0)
        {
            header('location:../add_enrollment.php?error=enrollment_exists');
            exit();
        }
        else
        {
            $query = "INSERT INTO enrollment(fname,cname,date,status) VALUES('$fname','$cname','$date','$status')";
            $result = mysqli_query($conn,$query);
            if($result){
                header('location:../enrollment.php?success=inserted');
                exit(); 
            }
        }
    }
?>