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
    $id = $_POST['id'];
    $supplier = $_POST['supplier'];
    //variable for upload pictures errors is initialised
    $uploadError = '';

    $picture = file_upload($_FILES['picture'],"pets");//file_upload() called  
    if($picture->error===0){
        ($_POST["picture"]=="pet.png")?: unlink("../pictures/$_POST[picture]");           
        $sql = "UPDATE pets SET `name` = '$name', `gender` = '$gender',`age` = '$age', `picture` = '$picture->fileName',`fk_supplierId` = $supplier WHERE id = {$id}";
    }else{
        $sql = "UPDATE pets SET `name` = '$name', `gender` = '$gender',`age` = '$age', `fk_supplierId` = $supplier WHERE id = {$id}";
    }    
    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "The record was successfully updated";
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . mysqli_connect_error();
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
    <body>  <!-- header -->
    <h1 style="background-image: url('pet.png');">PET Adoption Center</h1>
    <nav class="navbar navbar-expand-lg bg-warning">
  <div class="container-fluid">
    
    <a class="navbar-brand"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="senior.php">Senior</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="contacts.php">Contacts</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- header -->
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Update request response</h1>
            </div>
            <div class="alert alert-<?php echo $class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../update.php?id=<?=$id;?>'><button class="btn btn-warning" type='button'>Back</button></a>
                <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>