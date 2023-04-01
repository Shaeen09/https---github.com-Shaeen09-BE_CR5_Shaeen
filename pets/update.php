<?php
require_once '../components/db_connect.php';
session_start();

if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])){
    header("Location: ../index.php");
}
if(isset($_SESSION["user"])){
    header("Location: ../home.php");
}

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pets WHERE id = {$id}";
    $sqlSuppliers = "SELECT * FROM suppliers";
    $resultSuppliers = mysqli_query($connect, $sqlSuppliers);
    $options = "";
    while($row = mysqli_fetch_assoc($resultSuppliers)){
        if($row["supplierId"] == $data["fk_supplierId"]){
            $options .= "<option selected value='{$row["supplierId"]}'>{$row["sup_name"]}</option>";
        }else{
            $options .= "<option value='{$row["supplierId"]}'>{$row["sup_name"]}</option>";
        }
    }
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $name = $data['name'];
        $gender = $data['gender'];
        $age = $data['age'];
        $picture = $data['picture'];
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Pet</title>
        <?php require_once '../components/boot.php'?>
        <style type= "text/css">
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 60% ;
            }  
            .img-thumbnail{
                width: 70px !important;
                height: 70px !important;
            }     
        </style>
    </head>
    <body>
        <fieldset>
            <legend class='h2'>Update request <img class='img-thumbnail rounded-circle' src='../../pictures/<?php echo $picture ?>' alt="<?php echo $name ?>"></legend>
            <form action="actions/a_update.php"  method="post" enctype="multipart/form-data">
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <td><input class="form-control" type="text"  name="name" placeholder ="Product Name" value="<?php echo $name ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td><input class="form-control" type= "text" name="gender" step="any"  placeholder="gender" value ="<?php echo $gender ?>" /></td>
                    </tr>
                    <tr>
                        <th>age</th>
                        <td><input class="form-control" type="number"  name="age" placeholder ="Product Name" value="<?php echo $age ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Supplier</th>
                        <td><select name="supplier" class="form-control">
                            <?= $options; ?>
                        </select></td>
                    </tr>
                    <tr>
                        <th>Picture</th>
                        <td><input class="form-control" type="file" name= "picture" /></td>
                    </tr>
                    <tr>
                        <input type= "hidden" name= "id" value= "<?php echo $data['id'] ?>" />
                        <input type= "hidden" name= "picture" value= "<?php echo $data['picture'] ?>" />
                        <td><button class="btn btn-success" type= "submit">Save Changes</button></td>
                        <td><a href= "index.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </body>
</html>