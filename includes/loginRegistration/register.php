<?php
require_once "../../models/user.php";
require_once "../../models/database.php";
require_once "session.php";

session_start();

// initializing variables
	$fname = "";
	$lname = "";
	$email = "";
	$phone = "";
	$password="";
	


	// REGISTER USER
	if(isset($_POST['register'])){
		//$msg = array();
		
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$password = $_POST['password'];
	
		
	if (empty($fname = $_POST['fname'])) 
			{
			$msg = 'Please enter your First Name';
			
			}
			else if(empty($lname = $_POST['lname']))
			{
		    $msg = 'Please enter your Last Name';
		
			}
			else if(empty($email = $_POST['email']))
			{
		    $msg = 'Please enter your email';
		
			}
			else if(filter_var($email, FILTER_VALIDATE_EMAIL)== false)
			{
				
			$msg = 'Please use valid email';
	        }
			else if(empty($phone = $_POST['phone']))
			{
			$msg = 'Please enter phone';
			}
	       else if(empty($password = $_POST['password']))
			{
			$msg = 'Please enter password';
			}
		
			
	         if(!isset($msg))
	        {  

	  // insert into DB
	  
	  
	  
	  
			$dbcon = Database::getDb();
			$u = new User();
			$myuser = $u->addUser($fname, $lname, $email, $phone, md5($password), $dbcon);	
			 
			if ($myuser) 
			{
				$success = "You have signup successfully! ";
					
			}
			else{
			  
			  $msg ="You have not signup.";
		}
	}

}
	
  	$_SESSION['email'] = $email;
  	$_SESSION['success'] = "You are now logged in";
  	//header('location: login.php');
  

	
?>


<!DOCTYPE html>
<html>

<head>
	<title>Sign Up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../../css/login.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css" type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
</head>

<body>
	<main class="container">
		<div class="row">
		<div class="signup-form">
			<?php 
	if (isset($usrRegi)){
		echo$usrRegi;
	}
	?>
			<form action="register.php" method="POST">
				<div class="logo-container">
					<img src="../../images/logo.png" style="width:200px;">
				</div>
				<br>
				<h1>Sign Up</h1>
				<br>
				<p>If you have alredy registered <a href="login.php">click here</a></p>
				<div class="container">
					<?php
	if(isset($msg)){
	?>
					<div class="alert alert-danger">
						<?php echo $msg;?>
					</div>
					<?php } else if (isset($success)){?>
					<div class="alert alert-success">
						<?php echo $success; ?>
					</div>
					<?php }?>
				</div>
				<div class="txt">
					<label for="form_fname">First Name*</label>
					<input id="form_fname" type="text" name="fname" class="form-control" value="<?php echo $fname; ?>" />
				</div>
				<div class="txt">
					<label for="form_lname">Last Name*</label>
					<input id="form_lname" class="form-control" type="text" name="lname" value="<?php echo $lname; ?>" />
				</div>
				<div class="txt">
					<label for="form_email">Email*</label>
					<input id="form_email" class="form-control" type="email" name="email" value="<?php echo $email; ?>" />
				</div>
				<div class="txt">
					<label for="form_phone">Phone*</label>
					<input id="form_phone" class="form-control" type="text" name="phone" value="<?php echo $phone; ?>" />
				</div>
				<div class="txt">
					<label for="form_password">Password*</label>
					<input id="form_password" class="form-control" type="password" name="password" value="<?php echo $password; ?>" />
				</div>
				<input type="submit" name="register" class="btn-send" value="Register">

			</form>
			<a class="link_home_page" href="../../includes/homepage/homepage.php">Back to Home Page</a>
		</div>
</div>
	</main>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
