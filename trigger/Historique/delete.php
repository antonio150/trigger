<?php
include '../connect.php';
if(isset($_GET['deleteid'])){
    $id_somm=$_GET['deleteid'];

    $sql="delete from `somme_recettes` where id_somm=$id_somm";
    $result=mysqli_query($con,$sql);
    if($result){
        // echo "Deleted successfull";
        header('location:display.php');
    }else{
        die(mysqli_error($con));
    }
}


?>