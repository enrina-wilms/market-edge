<?php
require_once "../../config.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../../css/bootstrap-4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= $csspath ?>style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
	<link rel="icon" href="../../images/favicon-circle.png" type="image/jpg" sizes="20x20">
	<script src="https://cdn.ckeditor.com/4.11.4/basic/ckeditor.js"></script>
	<title>Market Edge</title>

</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark b">
		<a class="navbar-brand" href="../homepage/homepage.php"><img src="../../images/logo.png" style="width:150px"></a>
		<span class="navbar-text">Financial Visualization</span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="container header-search">
			<form action="../../includes/search/search_result.php" class="search">
				<div class="input-group collapse navbar-collapse" id="navbarSupportedContent" style="width:90%">
					<input type="text" class="form-control search-ticker" name="ticker" id="ticker" placeholder="Search ticker or company name">
					<span class="input-group-btn">
						<button class="btn btn-search" name="searchTicker" type="submit" id="search"><i class="fa fa-search fa-fw"></i> Search</button>
					</span>
				</div>
			</form>
			<a class="navbar-brand collapse navbar-collapse" href="../loginRegistration/logout.php">Logout</a>
		</div>
	</nav>
	<nav class="navbar navbar-expand-lg  navbar-dark bg-secondary">
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto mx-auto">
				<li class="nav-item active">
					<a class="nav-link py-0 text-warning" href="../homepage/homepage.php">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link py-0 text-white" href="../portfolio/portfolioView.php">Portfolio</a>
				</li>
				<li class="nav-item">
					<a class="nav-link py-0 text-white" href="../watchlist/watchlistView.php">Watchlist</a>
				</li>
				<li class="nav-item">
					<a class="nav-link py-0 text-white" href="../chart/chartView.php">Chart</a>
				</li>
				<li class="nav-item">
					<a class="nav-link py-0 text-white" href="../news/news.php">News</a>
				</li>
				<li class="nav-item">

					<a class="nav-link py-0 text-white" href="../gainersLosers/gainersLosers.php">Top Gainers/Losers</a>
				</li>
				<li class="nav-item">
					<a class="nav-link py-0 text-white" href="../blogs/blogs.php">Blog</a>

				</li>
				<li class="nav-item">
					<a class="nav-link py-0 text-white" href="../events/events.php">Events</a>
				</li>
			</ul>
		</div>
	</nav>



	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../../js/jquery-3.3.1.min.js"></script>
	<script src="../../js/popper.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/bootstrap.bundle.min.js"></script>
	<script src="../../js/jquery.slimscroll.min.js"></script>
	<script src="../../js/trial.js"></script>
	<script src="../../js/portfolio.js"></script>
