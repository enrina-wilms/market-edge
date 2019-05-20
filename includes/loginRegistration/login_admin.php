<?php
require_once '../../models/database.php';
require_once '../../models/user.php';
require_once 'session.php';


session_start();

 $email = "";
 $password =  "";
 
if(isset($_POST['admin_login'])){
   
   $user = $_POST['email'];
   $pass = md5($_POST['password']);
   $msg = "";
   
    if(empty($_POST["email"]) || empty($_POST["password"]))  
    {  
         $msg = "Incorrect email or password! Please try again.";
    }  
	else {
		$sql= "SELECT email, password FROM users WHERE email =? AND  password=?  ";
		
		$dbcon = Database::getDb();
		$query = $dbcon->prepare($sql);
        $query->execute(array($user,$pass));
		
    if($query->rowCount() >= 1) {
        $_SESSION['email'] = $user;
        $_SESSION['time_start_login'] = time();
        header("location: ../../includes/admin.php");  //????
    } else {
        $msg = "Email or Password is wrong";
	   header("location: secure.php");  
    }
  }
}
	
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		 <link href="../../css/login.css" rel="stylesheet" type="text/css">
		 <link rel="stylesheet" href="bootstrap/bootstrap.min.css" type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
       
    </head>
 <body>
	<main class="container">
     <div class="login-form">

<form action="login_admin.php" method="POST">
<h1>Admin Log In</h1>
<br>

        <div class="container">
		<!--message-->
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
	   <label>Email</label>
	   <input type="text" name="email" value="<?php echo $email; ?>">
	   </div>
	   <div class="txt">
	   <label>Password</label>
	   <input type="password" name="password" value="<?php echo $password ?>">
	   </div>
	   <a class="forgot" href="password.php">Forgot your password.</a>
	   <button type="submit" class="btn-send" name="admin_login">Submit</button>
	   
  
</form>
<a  class="link_home_page" href="../../includes/homepage.php">Back  to Home Page</a>

</div>

</main>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>      
    </body>
</html>