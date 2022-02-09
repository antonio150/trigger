<?php
    include '../connect.php';
    $vd_id=$_GET['updateid'];
    $sql="Select * from `vendeurs` where vd_id=$vd_id";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $vd_name=$row['vd_name'];
    $salaire=$row['salaire'];
    

    if(isset($_POST['submit'])){
        $vd_name=$_POST['vd_name'];
        $salaire=$_POST['salaire'];
        

        $sql="update `vendeurs`set  vd_name='$vd_name' ,salaire='$salaire' where vd_id='$vd_id' ";
       

        $result=mysqli_query($con,$sql);
        if($result){
            // echo "update successfully";
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
    <title>crud</title>
</head>
<body>
    <div class="container my-5">

    <form method="post">
        <div class="form-group">
            <label >Nom</label>
            <input type="text" class="form-control" placeholder="Enter votre nom"
                name="vd_name" autocomplete="off" value =<?php echo $vd_name; ?>
            >
        </div>
        
        <div class="form-group">
            <label >Salaire</label>
            <input type="text" class="form-control" placeholder="Enter votre salaire"
                name="salaire" autocomplete="off" value =<?php echo $salaire; ?>
            >
        </div>

        

        
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>

    </div>
    
</body>
</html>