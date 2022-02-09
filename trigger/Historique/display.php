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
    
        <table class="table">
            <thead>
                <tr>
                <th scope="col"> ID</th>
                <th scope="col"> Vendeur ID </th>
                <th scope="col">Somme</th>
                <th scope="col"> Date recette</th>
                <th scope="col"> Action Vendeur </th>
                <th scope="col">Date ajout</th>
               
                <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $sql="Select * from `somme_recettes`";
                    $result=mysqli_query($con,$sql);
                    if($result){
                        
                        while($row=mysqli_fetch_assoc($result)){
                            $id_somm=$row['id_somm'];
                            $vd_id=$row['vd_id'];
                            $som_recet=$row['som_recet'];
                            $date_recet=$row['date_recet'];
                            $action_vd=$row['action_vd'];
                            $date_ajout=$row['date_ajout'];
                            

                            echo '
                            <tr>
                                <th scope="row">'.$id_somm.'</th>
                                <td>'.$vd_id.'</td>
                                <td>'.$som_recet.'</td>
                                <td>'.$date_recet.'</td>
                                <td>'.$action_vd.'</td>
                                <td>'.$date_ajout.'</td>
                                

            <td>
            
            <button class="btn btn-danger"><a href="delete.php? deleteid='.$id_somm.'" class="text-light">Delete</a></button>
            
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