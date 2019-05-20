<?php
require_once '../../models/database.php';
require_once '../../models/contact.php';


if (isset($_GET['id'])){
	
	$id = $_GET['id'];
	$dbcon = Database::getDb();
	
	$c = new Contact();
	$count = $c->getContactById($id,$dbcon);
	
	//var_dump($contact);
}


?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="../../css/style_admin.css" type="text/css" >
<script type="text/javascript">
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
	<link rel="stylesheet" href="../../css/trial.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<title>Stock Market</title>
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<button class="navbar-toggler sideMenuToggler" type="button">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="../includes/portfolio.php" target="_blank">Stock Market</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<a href="#" class="nav-link px-2 sideMenuToggler">
				<i class="fas fa-sliders-h icon"></i>
			</a>
			<form class="form-inline ml-auto">
				<input class="form-control form-control-dark w-100 search" type="text" placeholder="Search" aria-label="Search">
<!--				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
			</form>
			<ul class="navbar-nav ml-auto">
				<li>
					<a class="nav-link" href="#" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-envelope icon"></i> <span class="badge badge-light">4</span>
					</a>
				</li>
				<li>
					<a class="nav-link" href="#" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-bell icon"></i> <span class="badge badge-light">4</span>
					</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Welcome Admin!
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Welcome Admin</a>
						<a class="dropdown-item" href="#">Settings</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="login/logout_admin.php">Sign Out</a>
					</div>
				</li>
			</ul>
		</div>
	</nav>

	<div class="wrapper d-flex">
		<div class="sideMenu bg-mattBlackLight">
			<div class="sidebar">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="#" class="nav-link px-2">
							<i class="fas fa-chart-bar icon"></i>
							<span class="text">Dashboard</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link px-2">
							<i class="fas fa-users icon"></i>
							<span class="text">Users</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="messages.php" class="nav-link px-2">
							<i class="fas fa-envelope icon"></i>
							<span class="text">Messages</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="../includes/blog.php" class="nav-link px-2">
							<i class="fab fa-blogger-b icon"></i>
							<span class="text">Blog</span></a>
						<p>
					</li>
					<li class="nav-item">
						<a href="../includes/events_admin.php" class="nav-link px-2">
							<i class="fas fa-calendar-alt icon"></i>
							<span class="text">Events</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="../includes/faq_admin.php" class="nav-link px-2">
							<i class="fas fa-question-circle icon"></i>
							<span class="text">FAQ</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	<div class="container">
	  <div class="row">
		<div class="col-md-12">
			<div class="bg-mattBlackLight my-2 p-3">
				
				<h1><?php echo $count->name; ?></h1>
		        <?php
		        echo  "Email : " . $count->email . "<br /><br/>";
		       echo  "Subject : " . $count->subject . "<br /></br>";
		       echo  "Message: " . $count->message . "<br /><br/>";     
                ?> 
				<br/>
			<a href="https://mail.google.com/mail/" class="message" title="Message" data-toggle="tooltip"><i class="fas fa-envelope"></i></a>
        <br/>
		<br/>
		<a  class="link" href="messages.php" >Back to Contact List</a>
		</div>
	</div>
 </div>			
</body>
</html>

