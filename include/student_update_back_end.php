<?php
    include "connection.php";

    if (isset($_POST['submit'])) {   
        
        $student_id = $_POST['id']; 
        $fname = $_POST['fname'];
        $nic = $_POST['nic'];
        $gender = $_POST['gender'];
        $age = $_POST['age']; 
        $dob = $_POST['dob'];
        $contact_no = $_POST['contact_no'];

        if (empty($fname) || empty($nic) || empty($gender) || empty($age) || empty($dob) || empty($contact_no)) {
            header('Location: ../student_update.php?update_id=' . $student_id . '&error=empty_fields');
            exit();
        }

        if (strlen($nic) !== 12 || !ctype_digit($nic)) {
            header('Location: ../student_update.php?update_id=' . $student_id . '&error=invalid_nic');
            exit();
        }
        if (strlen($contact_no) !== 10 || !ctype_digit($contact_no)) {
            header('Location: ../student_update.php?update_id=' . $student_id . '&error=invalid_phone');
            exit();
        }

           
                $query = "UPDATE student SET fname='$fname', nic='$nic', gender='$gender', age='$age', dob='$dob', contact_no='$contact_no' WHERE id='$student_id'";
                $stmt = mysqli_prepare($conn, $query);
                if (mysqli_stmt_execute($stmt)) {
                    header('Location: ../student.php?success=updated');
                    exit();
                } 
            
    }
?>
