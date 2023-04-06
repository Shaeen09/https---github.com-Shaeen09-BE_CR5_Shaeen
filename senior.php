<?php

require_once "components/db_connect.php";

session_start();
if (!isset($_SESSION["user"])) {
  header("location:index.php");
}


$sql = "SELECT * from pets WHERE age >= 8 ";
$result = mysqli_query($connect, $sql);
$tbody=''; //this variable will hold the body for the table
if(mysqli_num_rows($result)  > 0) {     
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){         
        $tbody .= "<tr>
            <td><img class='img-thumbnail' src='{$row['picture']}'</td>
            <td>" .$row['name']."</td>
            <td>" .$row['gender']."</td>
            <td>" .$row['age']."</td>
            
            <td><a href='details.php?id=" .$row['id']."'><button class='btn btn-success btn-sm' type='button'>Details</button></a>        
           
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <!-- header -->
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
        <div class="manageProduct w-75 mt-3">    
            <div class='mb-5'>
            <a href= "../dashboard.php"><button class="btn btn-success" type="button">Dashboard</button></a>
            </div>
            <p class='h2'>Pets</p>
            <table class='table table-striped'>
                <thead class='table-primary'>
                    <tr>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Age</th>
                         <th>Breed</th>
                        <th>Vaccinated</th>
                        <th>Supplier</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?= $tbody;?>
                </tbody>
            </table>
        </div>
    
</body>
</html>