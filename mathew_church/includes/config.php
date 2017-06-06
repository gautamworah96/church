<?php
ob_start();
session_start();

//set timezone
date_default_timezone_set('Asia/Kolkata');

//database credentials
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','church');

//application address
define('DIR','http://localhost/mathew_church/');
define('SITEEMAIL','bhaveshpatel640@gmail.com');
define('SITETITLE','Church Project');
try {

	//create PDO connection
	$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}

//include the user class, pass in the database connection
include('includes/classes/user.php');
include('includes/classes/phpmailer/mail.php');
$user = new User($db);
?>
