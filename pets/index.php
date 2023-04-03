<?php 
require_once '../components/db_connect.php';
session_start();
if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])){
    header("Location:../index.php");
    exit;
}
if(isset($_SESSION["user"])){
    header("Location:../home.php");
    exit;
}


$sql = "SELECT pets. *, suppliers.sup_name FROM pets JOIN suppliers on pets.fk_supplierId = suppliers.supplierId";
$result = mysqli_query($connect ,$sql);
$tbody=''; //this variable will hold the body for the table
if(mysqli_num_rows($result)  > 0) {     
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){         
        $tbody .= "<tr>
            <td><img class='img-thumbnail' src='../../pictures/" .$row['picture']."'</td>
            <td>" .$row['name']."</td>
            <td>" .$row['gender']."</td>
            <td>" .$row['age']."</td>
            <td>" .$row['sup_name']."</td>
            <td><a href='update.php?id=" .$row['id']."'><button class='btn btn-primary btn-sm' type='button'>Update</button></a>
            <a href='delete.php?id=" .$row['id']."'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
            </tr>";
    };
} else {
    $tbody =  "<tr><td colspan='6'><center>No Data Available </center></td></tr>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP CRUD</title>
        <?php require_once '../components/boot.php'?>
        <style type="text/css">
            .manageProduct {           
                margin: auto;
            }
            .img-thumbnail {
                width: 70px !important;
                height: 70px !important;
            }
            td {          
                text-align: left;
                vertical-align: middle;
            }
            tr {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="manageProduct w-75 mt-3">    
            <div class='mb-3'>
                <a href= "create.php"><button class='btn btn-primary'type="button" >Add PET</button></a>
                <a href= "../dashboard.php"><button class="btn btn-success" type="button">Dashboard</button></a>
            </div>
            <p class='h2'>Pets</p>
            <table class='table table-striped'>
                <thead class='table-success'>
                    <tr>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Breed</th>
                        <th>Vaccinated</th>
                        <th>Supplier</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $tbody;?>
                </tbody>
            </table>
        </div>
    </body>
</html>