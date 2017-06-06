<?php
$servername="127.0.0.1";
$username="root";
$password="root";
$db="church";
$port = 8889;

$conn=new mysqli($servername,$username,$password,$db,$port);
if($conn->connect_error)
    die ("Connection Failed ".$conn->connect_error);
    
?>

