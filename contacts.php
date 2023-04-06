<?php
require_once "components/db_connect.php";

session_start();
if (!isset($_SESSION["user"])) {
  header("location:index.php");
}


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
    <h2>Contact Us</h2>
    <p>Mobile +43676898989</p>
    <p>Email:apetcenter@mail.com</p>

    <h2>Address</h2>
    <p>Montleartstraße 37, 1160 Wien</p>

</body>
</html>