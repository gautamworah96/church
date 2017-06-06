<?php
ob_start();
require "includes/db.php";
$id = $_GET["act_id"];
$sql = "UPDATE users SET verified = 1 WHERE id=".$id;
$result = $conn->query($sql);
session_start();
$_SESSION["message"] = "Verified Successfully Now log in";
header("Location: index.php");
exit();
?>