<?php
include '../connect.php';
if(isset($_GET['deleteid'])){
    $vd_id=$_GET['deleteid'];

    $sql="delete from `recettes_vendeurs` where vd_id=$vd_id";
    $result=mysqli_query($con,$sql);
    if($result){
        // echo "Deleted successfull";
        header('location:display.php');
    }else{
        die(mysqli_error($con));
    }
}


?>