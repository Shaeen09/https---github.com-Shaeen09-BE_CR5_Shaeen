<?php
require_once '../../components/db_connect.php';
require_once '../../components/file_upload.php';

session_start();

if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])){
    header("Location:../../index.php");
}
if(isset($_SESSION["user"])){
    header("Location:../../home.php");
}

if ($_POST) {   
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $picture = $_POST['picture'];
    $supplier = $_POST['supplier'];
    $uploadError = '';
    //this function exists in the service file upload.
    $picture = file_upload($_FILES['picture'], "pets");  
   
    $sql = "INSERT INTO pets (name, gender, age,picture fk_supplierId) VALUES ('$name',$gender, $age,'$picture->fileName',$supplier)";

    if (mysqli_query($connect, $sql) === true) {
        $class = "success";
        $message = "The entry below was successfully created <br>
            <table class='table w-50'><tr>
            <td> $name </td>
            <td> $gender </td>
            <td> $age </td>
            <td>$picture</td>
            </tr></table><hr>";
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update</title>
        <?php require_once '../../components/boot.php'?>
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Create request response</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>