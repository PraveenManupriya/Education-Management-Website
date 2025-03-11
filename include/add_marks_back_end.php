<?php
    include "connection.php";

    if(isset($_POST['submit']))
    {   
        $course = $_POST['course'];
        $name = $_POST['name'];
        $mark = $_POST['mark'];
        $status = $_POST['status'];
        $remark = $_POST['remark'];

   
    $query = "INSERT INTO marks(course,name,mark,status,remark) VALUES('$course','$name','$mark','$status','$remark')";
    $result = mysqli_query($conn,$query);
    if($result){
        header('location:../student.php?success=inserted');
        exit(); 
    } 
}
    
?>