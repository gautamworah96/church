<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
	<script src='https://www.google.com/recaptcha/api.js'></script>

</head>

<body>
  <?php require "includes/header.php"; ?>

  
  <div class="container">
   <div class="container">
	<div class="row">
	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="signup_connect.php" autocomplete="off">
				<h2>Please Sign Up</h2>
				<p>Already a member? <a href='login.php'>Login</a></p>
				<hr>

				<?php
    session_start();
    if($_SESSION["signup_error"]){
  ?>
 		 <div class="alert alert-warning" role="alert"><?php echo $_SESSION["signup_error"] ;?></div>
  <?php 
  	}
    unset($_SESSION["signup_error"]);
  ?>


				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
				</div>
				<div class="form-group">
					<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="<?php if(isset($error)){ echo $_POST['email']; } ?>" tabindex="2">
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Confirm Password" tabindex="4">
						</div>
					</div>
				</div>
			   
				 <div class="g-recaptcha" data-sitekey="6LedJSAUAAAAAJMJpxPu7nn08ibHBMAbeA11NTsw"></div>


				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
				</div>
			</form>
		</div>
	</div>
</div>

  </div>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.js"></script>
</body>

</html>