<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
</head>

<body>
  <?php require "includes/header.php"; ?>

  		<?php
    session_start();
    if($_SESSION["message"]){
  ?>
 		 <div class="alert alert-warning" role="alert"><?php echo $_SESSION["message"] ;?></div>
  <?php 
  	}
    unset($_SESSION["message"]);
  ?>
  <p class="lead" style="text-align:center">
    <a class="btn btn-primary btn-lg" href="signup.php" role="button">Signup</a>
    <a class="btn btn-primary btn-lg" href="login.php" role="button">Login</a>
  </p>

 
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.js"></script>
</body>

</html>