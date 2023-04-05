<?php 

session_start();
require_once '../components/db_connect.php';

if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])){
    header("Location:../index.php");
}
if(isset($_SESSION["user"])){
    header("Location:../home.php");
}

    $id = $_GET['id'];
    $sql = "DELETE FROM `pets` WHERE id = {$id}";
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete Pet</title>
        <?php require_once '../components/boot.php'?>
        <style type= "text/css">
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 70% ;
            }     
            .img-thumbnail{
                width: 70px !important;
                height: 70px !important;
            }    
        </style>
    </head>
    <body>
        <fieldset>
        
            <h5>You have selected the data below:</h5>

            <h3 class="mb-4">Do you really want to delete this product?</h3>
            <form action ="actions/a_delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id ?>" />
                <input type="hidden" name="picture" value="<?php echo $picture ?>" />
                <button class="btn btn-danger" type="submit">Yes, delete it!</button>
                <a href="index.php"><button class="btn btn-warning" type="button">No, go back!</button></a>
            </form>
        </fieldset>
    </body>
</html>