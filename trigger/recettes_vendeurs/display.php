<?php
include '../connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    
    <title>crud operation</title>
</head>
<body>

    <div class="container">
        <button class="btn btn-primary my-5"><a class="text-light" href="user.php">Ajouter recettes</a> </button>
        <a href="../vendeurs/display.php">Vendeurs</a>
        <a href="../Historique/display.php">Historique</a>
    
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Vendeur ID</th>
                <th scope="col"> Date </th>
                <th scope="col">Montant</th>
               
                <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $sql="Select * from `recettes_vendeurs`";
                    $result=mysqli_query($con,$sql);
                    if($result){
                        
                        while($row=mysqli_fetch_assoc($result)){
                            $vd_id=$row['vd_id'];
                            $rc_date=$row['rc_date'];
                            $rc_montant=$row['rc_montant'];
                            

                            echo '
                            <tr>
                                <th scope="row">'.$vd_id.'</th>
                                <td>'.$rc_date.'</td>
                                <td>'.$rc_montant.'</td>
                                

            <td>
            <button class="btn btn-primary"><a href="update.php? updateid='.$vd_id.'" class="text-light">Update</a></button>
            <button class="btn btn-danger"><a href="delete.php? deleteid='.$vd_id.'" class="text-light">Delete</a></button>
            
            </td>
                            </tr>
                            
                            ';
                        }
                    }

                ?>
            
              
            </table>
    </div>
    
</body>
</html>