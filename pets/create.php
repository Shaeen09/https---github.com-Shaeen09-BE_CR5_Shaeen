<?php
session_start();
require_once "../components/db_connect.php";

if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])){
    header("Location:../index.php");
}
if(isset($_SESSION["user"]) !="") { 
    header("Location:../home.php");
}

$sql = "Select * FROM `suppliers`";

$result = mysqli_query($connect, $sql);
$options= "";
while($row = mysqli_fetch_assoc($result)){
$options .= "<option value='{$row["supplierId"]}'>{$row["sup_name"]}</option>";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once '../components/boot.php'?>
        <title>PHP CRUD  |  Add Product</title>
        <style>
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 60% ;
            }       
        </style>
    </head>
    <body>
        <fieldset>
            <legend class='h2'>Add Pet</legend>
            <form action="actions/a_create.php" method="post" enctype="multipart/form-data">
                <table class='table'>
                    <tr>
                        <th>Name</th>
                        <td><input class='form-control' type="text" name="name"  placeholder="Product Name" /></td>
                    </tr>    
                    <tr>
                        <th>gender</th>
                        <td><input class='form-control' type="text" name= "gender" placeholder="gender"  /></td>
                    </tr>
                    <tr>
                        <th>Breed</th>
                        <td><input class='form-control' type="text" name="breed"  placeholder="breed Name" /></td>
                    </tr>
                    <tr>
                        <th>Size</th>
                        <td><input class='form-control' type="text" name="size"  placeholder="size" /></td>
                    </tr>      
                    <tr>
                        <th>Vaccinated</th>
                        <td><input class='form-control' type="text" name="vaccinated"  placeholder="vaccinated" /></td>
                    </tr>  
                    <tr>
                        <th>Availability</th>
                        <td><input class='form-control' type="text" name="availability"  placeholder="availability" /></td>
                    </tr>    
                    <tr>
                        <th>Age</th>
                        <td><input class='form-control' type="number" name="age" /></td>
                    </tr>
                    <tr>
                        <th>picture</th>
                        <td><input class='form-control' type="text" name="picture"   /></td>    
                    </tr>  
                    <tr>
                        <th>Supplier</th>
                        <td><select class="form-control" name="supplier">
                            <option value="none">Select a supplier</option>
                            <?= $options; ?>
                            </select></td>
                    </tr>      
                    <tr>
                        <td><button class='btn btn-success' type="submit">Insert Product</button></td>
                        <td><a href="index.php"><button class='btn btn-warning' type="button">Home</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </body>
</html>