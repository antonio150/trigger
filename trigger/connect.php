<?php

    $con=new mysqli('localhost','root','','vente');
    
    if(!$con){
        die(mysqli_error($con));
    }

?>