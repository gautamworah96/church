<?php
	ob_start();
	if($_POST["username"] && $_POST["password"] && $_POST["email"] ){

		if(true){
			
			require "includes/db.php";

			if(finduser($_POST["username"])){
				if(findemail($_POST["email"])){
					$username = $_POST["username"];
					$password = $_POST["password"];
					$password = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
					$email = $_POST["email"];
					$sql = "INSERT INTO users (username,password,email) VALUES ('".$username."' , '".$password."' , '".$email."')";
					$result = $conn->query($sql);

					sendemail($email);
					session_start();
					$_SESSION["message"] = "Successfully registered check your email for account verificiation";
					header("Location: index.php");
					exit();
				}
				else{
					session_start();
					$_SESSION["signup_error"] = "Email taken";
					header("Location: signup.php");
					exit();
				}
			}
			else{
				session_start();
				$_SESSION["signup_error"] = "Username taken";
				header("Location: signup.php");
				exit();
			}
		}else{
			session_start();
			$_SESSION["signup_error"] = "Failed Human Verification";
			header("Location: signup.php");
			exit();
		}
		
	}
	else{
		session_start();
		$_SESSION["signup_error"] = "Validation not done";
		header("Location: signup.php");
		exit();
	}

	function finduser($user){
		require "includes/db.php";
		$sql = "SELECT username from users where username = '".$user."'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			return false;
		}

		return true;
	}

	function findemail($email){
		require "includes/db.php";
		$sql = "SELECT username from users where email = '".$email."'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			return false;
		}

		return true;

	}

	function sendemail($email){
		try{
		require "includes/db.php";
		require "includes/phpmailer/mail.php";
		require "includes/config.php";
		$mailsend = new Mail();
		$sql = "SELECT * from users where email = '".$email."'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$id = $row["id"];
		 $result->close();
		$bod = "To Verify Your Account Click <a href=''>".$url."/verifyaccount?id=.".$id."</a>";
		//send email
		$to = $email;
		$subject = "Registration Confirmation";
		$body = "<p>Thank you for registering at demo site.</p>
		<p>To activate your account, please click on this link: <a href='".$url."/activate.php?act_id=$id'>".$url."/activate.php?act_id=$id</a></p>
		<p>Regards Site Admin</p>";
		$mail = new Mail();
		$mail->setFrom(SITEEMAIL);
		$mail->addAddress($to);
		$mail->subject($subject);
		$mail->body($body);
		$mail->send();

		}
		catch(PDOException $e) {
		    $error[] = $e->getMessage();
			var_dump($e);
		}
	}

	function verifycap (){

		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$data = array(
		'secret' => '6LedJSAUAAAAAPTuso3JVwKV2qKWiYPGnpQItwLz',
		'response' => $_POST["g-recaptcha-response"]
		);
		$options = array(
		'http' => array (
			'method' => 'POST',
			'content' => http_build_query($data)
		)
		);
		$context  = stream_context_create($options);
		$verify = file_get_contents($url, false, $context);
		$captcha_success=json_decode($verify);
		return $captcha_success->success;
		
	}
?>