<?php
    include "connection.php";

    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];     
        $description = $_POST['description'];
        $duration = $_POST['duration'];
        $instructor = $_POST['instructor'];
        $level = $_POST['level'];
        $fee = $_POST['fee'];
        
        $check_course = "SELECT * FROM courses WHERE name='$name'";
        $check_course_result = mysqli_query($conn,$check_course);
        if(mysqli_num_rows($check_course_result) > 0)
        {
            header('location:../add_course.php?error=course_exists');
            exit();
        }
        else
        {
            $query = "INSERT INTO courses(name,description,duration,instructor,level,fee) VALUES('$name','$description','$duration','$instructor','$level','$fee')";
            $result = mysqli_query($conn,$query);
            if($result){
                header('location:../course.php?success=inserted');
                exit(); 
            }
        }
    }
?>