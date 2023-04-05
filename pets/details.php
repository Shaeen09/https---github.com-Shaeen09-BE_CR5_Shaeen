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

$id = $_GET["id"];
$sql = "SELECT * FROM `pets` WHERE id = $id ";
$result = mysqli_query($connect, $sql);

$row =mysqli_fetch_assoc($result);

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
       <div class="container">
       
            <p class='h2'>Pets Details</p>
            <div class="card" style="width: 24rem;">
  <img src="<?$row['picture']?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?$row['name']?></h5>
    <h5 class="card-title"><?$row['gender']?></h5>
    <h5 class="card-title"><?$row['breed']?></h5>
    <h5 class="card-title"><?$row['age']?></h5>
    <h5 class="card-title"><?$row['vaccinated']?></h5>
    <a href="index.php" class="btn btn-primary">Home</a>
  </div>
            </div>
        <a href= "create.php"><button class='btn btn-warning'type="button" >PET Details</button></a>
     <a href= "../dashboard.php"><button class="btn btn-success" type="button">Dashboard</button></a>        
        </div>          
        
    </body>
</html>