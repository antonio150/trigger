<?php
    include '../connect.php';
    
    if(isset($_POST['submit'])){
        $vd_id=$_POST['vd_id'];
        $rc_date=$_POST['rc_date'];
        $rc_montant=$_POST['rc_montant'];
       

        $sql="insert into `recettes_vendeurs` (vd_id,rc_date,rc_montant) values('$vd_id','$rc_date','$rc_montant')";
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
            <label >ID</label>
            <input type="number" class="form-control" placeholder="Entrer l'ID Vendeur"
                name="vd_id" autocomplete="off"
            >
        </div>
        <div class="form-group">
            <label >Date</label>
            <input type="date" class="form-control" placeholder="Entrer la date"
                name="rc_date" autocomplete="off"
            >
        </div>
        
        <div class="form-group">
            <label >Montant</label>
            <input type="text" class="form-control" placeholder="Entrer montant"
                name="rc_montant" autocomplete="off"
            >
        </div>

       
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

    </div>
    
</body>
</html>