<?php
require_once "components/db_connect.php";

session_start();
if (!isset($_SESSION["user"])) {
  header("location:index.php");
}

$id = $_GET["id"];
$sql = "SELECT * from pets WHERE id = $id ";
$result = mysqli_query($connect, $sql);

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
  <div>
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title"><?= $row["id"] ?></h5>
        <h6 class="card-subtitle mb-2 text-body-secondary"><img src="pictures/<?= $row["picture"] ?>"></h6>
        <h6 class="card-subtitle mb-2 text-body-secondary"><?= $row["name"] ?></h6>
        <h6 class="card-subtitle mb-2 text-body-secondary"><?= $row["gender"] ?></h6>
        <h6 class="card-subtitle mb-2 text-body-secondary"><?= $row["age"] ?></h6>
        <h6 class="card-subtitle mb-2 text-body-secondary"><?= $row["sup_name"] ?></h6>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
      </div>
    </div>
</div>

</body>

</html>