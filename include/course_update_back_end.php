<?php
    include "connection.php";

    if (isset($_POST['submit'])) {   
        
        $course_id = $_POST['id']; 
        $name = $_POST['name'];
        $description = $_POST['description'];
        $duration = $_POST['duration'];
        $instructor = $_POST['instructor']; 
        $level = $_POST['level'];
        $fee = $_POST['fee'];

        if (empty($name) || empty($description) || empty($duration) || empty($instructor) || empty($level) || empty($fee)) {
            header('Location: ../course_update.php?update_id=' . $course_id . '&error=empty_fields');
            exit();
        }
           
                $query = "UPDATE courses SET name='$name', description='$description', duration='$duration', instructor='$instructor', level='$level', fee='$fee' WHERE id='$course_id'";
                $stmt = mysqli_prepare($conn, $query);
                if (mysqli_stmt_execute($stmt)) {
                    header('Location: ../course.php?success=updated');
                    exit();
                } 
            
    }
?>
