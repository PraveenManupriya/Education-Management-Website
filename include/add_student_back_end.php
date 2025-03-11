<?php
    include "connection.php";

    if(isset($_POST['submit']))
    {   
        $fname = $_POST['fname'];
        $nic = $_POST['nic'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $dob = $_POST['dob'];
        $contact_no = $_POST['contact_no'];     
        
        $image=$_FILES['imgFile']['name'];
        $temp_name=$_FILES['imgFile']['tmp_name'];
        $folder="../student_img/".$image;

        $check_nic = "SELECT * FROM student WHERE nic='$nic'";
        $check_nic_result = mysqli_query($conn,$check_nic);
        if(mysqli_num_rows($check_nic_result) > 0)
        {
            header('location:../add_student.php?error=student_exists');
            exit();
        }
        else
        {
            $query = "INSERT INTO student(fname,nic,gender,age,dob,contact_no,images) VALUES('$fname','$nic','$gender','$age','$dob','$contact_no','$image')";
            $result = mysqli_query($conn,$query);
            if($result){
                move_uploaded_file($temp_name,$folder);
                header('location:../student.php?success=inserted');
                exit(); 
            }
        }
    }
?>