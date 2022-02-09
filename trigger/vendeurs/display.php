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
        <button class="btn btn-primary my-5"><a class="text-light" href="user.php">Ajouter vendeur</a> </button>
        <a href="../recettes_vendeurs/display.php">Recettes du vendeurs</a>
        <a href="../Historique/display.php">Historique</a>
    
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Vendeur ID</th>
                <th scope="col"> Nom Vendeur </th>
                <th scope="col">Salaire</th>
               
                <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $sql="Select * from `vendeurs`";
                    $result=mysqli_query($con,$sql);
                    if($result){
                        
                        while($row=mysqli_fetch_assoc($result)){
                            $vd_id=$row['vd_id'];
                            $vd_name=$row['vd_name'];
                            $salaire=$row['salaire'];
                            

                            echo '
                            <tr>
                                <th scope="row">'.$vd_id.'</th>
                                <td>'.$vd_name.'</td>
                                <td>'.$salaire.'</td>
                                

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