<?php
// echo $_SERVER['SCRIPT_NAME'];
require_once "components/db_connect.php";
require_once "components/file_upload.php";

session_start();

if(isset($_SESSION["user"])){
    header("Location: home.php");
}
if(isset($_SESSION["adm"])){
    header("Location: dashboard.php");
}
$error = false;
$fnameError = $lnameError =$password= $emailError = $passError = $dateError = $first_name = $last_name = $email = $picture ="";
function cleanInput($param){
    $clean = trim($param);
    $clean = strip_tags($clean);
    $clean = htmlspecialchars($clean);

    return $clean;
}

if(isset($_POST["register"])){
    echo "Hello";
$error = false;

    $first_name = cleanInput($_POST["first_name"]);
    $last_name = cleanInput($_POST["last_name"]);
    $password = cleanInput($_POST["password"]);
    $email = cleanInput($_POST["email"]);
    $date_of_birth = cleanInput($_POST["date_of_birth"]);
    $picture = file_upload($_FILES['picture']);
    
if(empty($first_name)){
    $error = true;
    $fnameError ="please enter your first name";
}elseif(strlen($first_name)< 3){
    $error = true ;
    $fnameError = "first name must have at least 3 chars";
}elseif(!preg_match("/^[a-zA-Z]+$/", $first_name)){
    $error = true;
    $fnameError = "First name must contain only letters and no spaces";
}

if(empty($last_name)){
    $error = true;
    $fnameError ="please enter your last name";
}elseif(strlen($last_name)< 3){
    $error = true ;
    $lnameError = "last name must have at least 3 chars";
}elseif(!preg_match("/^[a-zA-Z]+$/", $last_name)){
    $error = true;
    $lnameError = "Last name must contain only letters and no spaces";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = true;
    $emailError = "Please enter valid email address.";
} else{
     // checks whether the email exists or not
     $query = "SELECT email FROM users WHERE email='$email'";
     $result = mysqli_query($connect, $query);
     $count = mysqli_num_rows($result);
     if ($count != 0) {
         $error = true;
         $emailError = "Provided Email is already in use.";
     }
    }
    // checks if the date input was left empty
    if (empty($date_of_birth)) {
        $error = true;
        $dateError = "Please enter your date of birth.";
    }
    // password validation
    if (empty($password)) {
        $error = true;
        $passError = "Please enter password.";
    } else if (strlen($password) < 6) {
        $error = true;
        $passError = "Password must have at least 6 characters.";
    }
  
    // password hashing for security
    $password = hash('sha256', $password);
    // if there's no error, continue to signup
    if (!$error) {
  
        $sql = "INSERT INTO users(first_name, last_name, password, date_of_birth, email, picture)
                  VALUES(' $first_name ', ' $last_name ', '$password', '$date_of_birth', '$email', '$picture->fileName')";
        $res = mysqli_query($connect, $sql);
  
        if ($res) {
            $errTyp = "success";
            $errMSG = "Successfully registered, you may login now";
            $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again later...";
            $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
        }
    }

}
mysqli_close($connect);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "components/boot.php" ?>
    <title>Login & Registration Form</title>
</head>
<body>
   
    <div class="container">
    <h1>Registration Form</h1>
    <div class="alert alert-success" role="alert">
        A simple primary alert-check it out!

    </div>
    <form method="post" class="w-75" action="<?=htmlspecialchars($_SERVER['SCRIPT_NAME'])  ?>" enctype="multipart/form-data">
    <?php
          if (isset($errMSG)) {
          ?>
              <div class="alert alert-<?php echo $errTyp ?>">
                  <p><?php echo $errMSG; ?></p>
                  <p><?php echo $uploadError; ?></p>
              </div>

          <?php
          }
          ?>
    
    
    <input type="text" placeholder="Type your first name" class="form-control" name="first_name" value="<?= $first_name ?>">
    <span class="text-danger"><?= $fnameError ?></span>
    <input type="text" placeholder="Type your last name" class="form-control" name="last_name" maxlength="30" value="<?= $last_name ?>">
    <span class="text-danger"><?= $lnameError ?></span>
    <input type="email" placeholder="Type your email" class="form-control" name="email" value="<?= $email ?>">
    <span class="text-danger"><?= $emailError ?></span>
    <input type="password" placeholder="Type your password" class="form-control" name="password">
    <span class="text-danger"><?= $passError ?></span>
    <input type="date"  class="form-control" name="date_of_birth">
    <span class="text-danger"><?= $dateError ?></span>
    <input type="file"  class="form-control" name="picture">
    <input type="submit" class="form-control" name="register" value="Register">




    </form>
    </div>
</body>
</html>