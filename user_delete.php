<?php
    include("include/connection.php");
    if(isset($_GET['delete_id'])){
        $delete_id = $_GET['delete_id'];

        $query = "DELETE FROM users WHERE id='$delete_id'";
        $result = mysqli_query($conn,$query);
        header("location:users.php");
        exit();

    }

?>