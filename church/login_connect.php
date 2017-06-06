<?php
ob_start();
if($_POST["username"] && $_POST["password"]){
	require "includes/db.php";
	$username=$_POST["username"];
	$sql = "select * from users  where username = '".$username."'";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
        $row = $result->fetch_assoc();
		if($row["verified"]== 0){
			session_start();
			$_SESSION["message"] = "Please Verify Your Email Id";
			header("Location: index.php");
			exit();
		}
		else{
			$hash = $row["password"];
			$checked = password_verify($_POST['password'],$hash);
			if ($checked) {
				session_start();
				$_SESSION["user_id"] = $row["id"];
				$_SESSION["username"] = $row["username"];
                session_commit();
				header("Location: home.php");
				exit();
			}
			else {
				session_start();
				$_SESSION["message"] = "Wrong Username or Password";
				header("Location: index.php");
				exit();
			}
		}
	}
	else{
		session_start();
		$_SESSION["message"] = "Wrong Username or Password";
		header("Location: index.php");
		exit();
	}
}
else{
	session_start();
	$_SESSION["message"] = "Wrong Username or Password";
	header("Location: index.php");
	exit();
}



?>