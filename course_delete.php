<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="DELETE FROM `courses` WHERE id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        // echo "Deleted successfull";
        header('location:course_display.php');
    }
    else{
        die(mysqli_error($con));
    }
}
?>