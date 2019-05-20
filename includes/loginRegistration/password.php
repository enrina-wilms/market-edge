<?php
require_once "../model/database.php";


//we decided that it next step, not now


/*$email = "";

if (isset($_POST['submit'])){  
   
    $email = $_POST['email'];
                
    if (empty($email)){
        "Enter Email !";
    }
   else{
        $query = "SELECT * FROM users WHERE email = '$email'";
        
		
		$dbcon = Database::getDb();
		$query = $dbcon->prepare($sql);
        $query->execute(array($user,$pass));
		
		if (empty($array)){
            echo 'This email not found!';
        }
        elseif (mysql_num_rows($result) > 0){
        $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
        $max=10; 
        $size=StrLen($chars)-1; 
        $password=null; 
                                               
        while($max--) {
              $password.=$chars[rand(0,$size)]; 
        }
        $newmdPassword = md5($password); 
        $title = 'Create new password '.$email;
        $letter = 'You requested to create account password'.$email.' on website stock_market.com \r\nNew password: '.$password.'\r\n';
		
     // send mail
        if (mail($email, $title, $letter, "Content-type:text/plain; Charset=windows-1251\r\n")) {
             mysql_query("UPDATE users SET password = '$newmdPassword'  email = '$email'");
        echo 'Password sent to your email!<br><a ref="#">Home page</a>';
         }
      }                              
   }
}
//mysql_close();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Forgot password</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		 <link href="main.css" rel="stylesheet" type="text/css">
		 <link rel="stylesheet" href="bootstrap/bootstrap.min.css" type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
       
    </head>
 <body>
	<main class="container">
     <div class="login-form">

<form action="password.php" method="POST">
<h4>Please, enter your email.</h4>
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
  
   <button type="submit" class="btn-send" name="submit">Submit</button>
   
  
</form>
<a  class="link_home_page" href="">Back  to Home Page</a>

</div>

</main>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>      
    </body>
</html>*/


