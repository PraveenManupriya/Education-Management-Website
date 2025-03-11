<?php
    include "connection.php";

    if (isset($_POST['submit'])) {   
        
        $enrollment_id = $_POST['id']; 
        $fname = $_POST['fname'];
        $cname = $_POST['cname'];
        $date = $_POST['date'];
        $status = $_POST['status']; 

        if (empty($fname) || empty($cname) || empty($date) || empty($status)) {
            header('Location: ../enrollment_update.php?update_id=' . $enrollment_id . '&error=empty_fields');
            exit();
        }
           
                $query = "UPDATE enrollment SET fname='$fname', cname='$cname', date='$date', status='$status' WHERE id='$enrollment_id'";
                $stmt = mysqli_prepare($conn, $query);
                if (mysqli_stmt_execute($stmt)) {
                    header('Location: ../enrollment.php?success=updated');
                    exit();
                } 
            
    }
?>
