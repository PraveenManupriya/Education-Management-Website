<?php
    include("include/connection.php");
    if(isset($_GET['delete_id'])){
        $delete_id = $_GET['delete_id'];

        $query = "DELETE FROM enrollment WHERE id='$delete_id'";
        $result = mysqli_query($conn,$query);
        header("location:enrollment.php");
        exit();

    }

?>