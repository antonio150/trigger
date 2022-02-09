<?php
    include '../connect.php';
    $vd_id=$_GET['updateid'];
    $sql="Select * from `recettes_vendeurs` where vd_id=$vd_id";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $rc_date=$row['rc_date'];
    $rc_montant=$row['rc_montant'];
    

    if(isset($_POST['submit'])){
        $rc_date=$_POST['rc_date'];
        $rc_montant=$_POST['rc_montant'];
        

        $sql="update `recettes_vendeurs`set  rc_date='$rc_date' ,rc_montant='$rc_montant' where vd_id='$vd_id' ";
       

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
            <label >Date</label>
            <input type="date" class="form-control" placeholder="Enter date"
                name="rc_date" autocomplete="off" value =<?php echo $rc_date; ?>
            >
        </div>
        
        <div class="form-group">
            <label >Salaire</label>
            <input type="text" class="form-control" placeholder="Enter montant"
                name="rc_montant" autocomplete="off" value =<?php echo $rc_montant; ?>
            >
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>

    </div>
    
</body>
</html>