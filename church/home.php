<?php 
ob_start();
session_start();
if($_SESSION["username"] == null || $_SESSION["user_id"] == null){
  header("Location: index.php");
	exit();
}
?>
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

  <?php require "includes/header3.php";?>

  


  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.js"></script>
</body>

</html>