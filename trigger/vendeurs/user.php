<?php
    include '../connect.php';
    
    if(isset($_POST['submit'])){
        $vd_name=$_POST['vd_name'];
        $salaire=$_POST['salaire'];
       

        $sql="insert into `vendeurs` (vd_name,salaire) values('$vd_name','$salaire')";

       

        $result=mysqli_query($con,$sql);
        if($result){
            // echo "Data inserted successfully";
            header('location:display.php');
        }else{
            die(mysqli_error($con));
        }
    }

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <title>client</title>
</head>
<body>
    <div class="container my-5">

    <form method="post">
        <div class="form-group">
            <label >Nom</label>
            <input type="text" class="form-control" placeholder="Entrer votre nom"
                name="vd_name" autocomplete="off"
            >
        </div>
        
        <div class="form-group">
            <label >Salaire</label>
            <input type="text" class="form-control" placeholder="Entrer votre salaire"
                name="salaire" autocomplete="off"
            >
        </div>

       
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

    </div>
    
</body>
</html>