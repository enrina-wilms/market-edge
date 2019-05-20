<?php	
 require_once '../../models/database.php';
  require_once '../../models/contact.php';
  require_once '../../config_test.php';
 
		$name ='';
		$email ='';
		$subject ='';
		$message ='';
		
     

		//check for submit
		
		if(isset($_POST['submit'])){
			
			if (empty($name = $_POST['name'])) 
			{
			$msg = 'Please enter your name';
			
			}
			else if(empty($email = $_POST['email']))
			{
		    $msg = 'Please enter your email';
		
			}
			else if(filter_var($email, FILTER_VALIDATE_EMAIL)== false)
			{
				
			$msg = 'Please use valid email';
	        }
			else if(empty($subject = $_POST['subject']))
			{
			$msg = 'Please enter subject';
			
			}
			else if(empty($message = $_POST['message']))
			{
			$msg = 'Please write your message';
			
			}
			if(!isset($msg))
			{
			//recepient email
			$name = $_POST['name'];
	        $email = $_POST['email'];
	        $subject = $_POST['subject'];
	        $message = $_POST['message'];
			
			
			$to = "example@gmail.com";
			$body = '<h2>Contact Request</h2>
			<h4>Name</h4><p>'. $name. '</p>
			<h4>Email</h4><p>'. $email. '</p>
			<h4>Subject</h4><p>'. $subject. '</p>
			<h4>Message</h4><p>'. $message. '</p>';
			
			
			$headers = "MINE-Version:1.0" ."r\n";
			$headers .= "Content-Type:text/html; charset=UTF-8" . "r\n";
			
			//Additional headers
	     	$headers .= "From:". $name. "<" .$email. ">"."r\n";
			}
			if(mail($to, $subject, $body, $headers))
			{
				
				//insert data
				
			
              $dbcon = Database::getDb();
			  $c = new Contact();
			  $mycon = $c->addContact($name, $email, $subject, $message, $dbcon);
			
			
				
			if ($mycon) 
			{
				$success = "Thank you. We will contact with you soon";
            
			}
				
			
			else
			{
				 $msg = "Your message not sent";
			}
	
			
		}
	}			
			
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Contact Us</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="../../css/main2.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css" type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    </head>
    <body style="background:url(city.jpeg);">
	<main class="container" style="background:url(toronto1.jpeg);">
         <div class="contact-form">
             <form  method="post" action="index.php">
                 <h1>Contact Us</h1>
				 <!--message-->
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
                    <label for="form_name">Name *</label>
                    <input id="form_name" type="text" name="name" class="form-control"  placeholder="Name" value = "<?= $name; ?>">
                    </div>
                    <div class="txt">
                    <label for="form_email">Email *</label>
                    <input id="form_email" type="text" name="email" class="form-control" placeholder="Email" value = "<?= $email; ?>" >
                    </div>   
                    <div class="txt">
                    <label for="form_subject">Subject *</label>
                    <input id="form_subject" type="text" name="subject" class="form-control"  placeholder="Subject" value = "<?= $subject; ?>" >
                    </div>   
                    <div class="txt">
                    <label for="form_message">Message *</label>
                    <textarea id="form_message" name="message" class="form-control"  placeholder="Message" cols="40" rows="3" ><?= $message; ?></textarea>
                    </div>
                    <input type="submit" name="submit" class="btn-send" value="Submit"> 
                    </form>
				    <a  class="link_home_page" href="../../includes/homepage/homepage.php">Back  to Home Page</a>
					</div>
					
	</main>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>      
    </body>
</html>
