<?php

require_once "../../userSession.php";
require_once '../../config_test.php';

/*
 * statusAdd.php IS CONTAINS THE LOGIC FOR ADDING, UPDATING AND DELETING USER STATUS
 *THE statusList.php is WHERE I DISPLAY THE LIST OF STATUS THAT IS CURRENTLY STORED IN OUR DATABASE*/
require_once INCLUDES_STATUS_PATH . "/statusAdd.php";

//add this to every page. if user is not login it will redirect to login page
if ($_SESSION['uid'] == ''){
    header("location: ../loginRegistration/login.php");   
}

$fName = $_SESSION['uFname'];
$lName = $_SESSION['uLname'];
$firstChar = mb_substr($fName, 0, 1, "UTF-8");
$secChar = mb_substr($lName, 0, 1, "UTF-8");


?>

<?php require_once 'header.php'; ?>

<!-- PAGE CONTENT -->
<div class="jumbotron jumbotron-fluid">
	<div class="container">
		<h1 class="ml-auto">
			<span class="homepage-market">Market</span>
			<span class="homepage-edge">Edge</span>
		</h1>
		<br>
		<h2>Financial Visualization for the Latest Stock Market<br /> Company, News, and more.</h2>
		<p class="lead">Get started and Invest for your future</p>
		<hr/>
		<hr/>
		<a class="btn btn-lg homepage-btn" href="../portfolio/portfolioView.php" role="button">Add Portfolio</a>
		<a class="btn btn-lg homepage-btn" href="../watchlist/watchlistView.php" role="button">Add Watchlist</a>
	</div>
</div>
<div class="container homepage-main">

	<div class="row">
		<!-- SECTION WHERE USER CAN SHARE AND POST A STATUS RELATED TO STOCK MARKET -->
		<!-- col-md-8 -->
		<div class="col-md-8">
			<h5 class="homepage-h5">Share Your Status


				<hr />
				<div>
					<button type="button" class="btn btn-block btn-lg text-left status-text-modal" data-toggle="modal" data-target="#exampleModalCenter">
						<div class="status-avatar-circle">
							<span class="status-initials"> <?php echo $firstChar . $secChar; ?> </span>
						</div>
						What's on your mind <?php echo $_SESSION['uFname'];?>? &nbsp;Share It!
					</button>
					<?php require_once "../../includes/status/statusModal.php";?>
					
				</div>
			</h5>
			<hr>
			<h5 class="homepage-h5"><a href="../portfolio/portfolioView.php">Portfolio</a></h5>
			<div class="card mb-3">
				<?php  
			require_once INCLUDES_PORTFOLIO_PATH . "/portfolioHomepage.php";
			?>
			</div>
			
			<h5 class="homepage-h5"><a href="../watchlist/watchlistView.php">Watchlist</a></h5>
			<div class="card mb-3">
				<?php  
			require_once INCLUDES_WATCHLIST_PATH . "/watchlistHomepage.php";
			?>
			</div>

			<h5 class="homepage-h5"><a href="../news/news.php">Latest News</a></h5>
			<div class="card mb-3">
			<div class="homepage-news">
				<?php  
			require_once INCLUDES_NEWS_PATH . "/news-homepage.php";
			?>
			</div>
			</div>

						

		</div>
		<!-- col-md-8 -->

		<!--START OF SIDE BAR -->
		<!-- col-md-4 -->
		<!--PLACE WHERE THE LIST OF STATUS WILL BE DISPLAYED-->
		<div class="col-md-4">
			<h5 class="homepage-h5">Recent Status</h5>
			<div class="status-recent">
				<?php  
			require_once INCLUDES_STATUS_PATH . "/statusList.php";
			require_once "../../includes/status/updateModal.php";
			?>

			</div>
			
			<br>
			<h5 class="homepage-h5">IPO Calendar</h5>
			<div class="ipo-calendar">
				<?php  
			require_once INCLUDES_IPO_PATH . "/ipo.php";
			?>
			</div>
		</div>
		<!-- col-md-4 -->
		<!--END OF SIDE BAR -->

	</div>
	<!-- ROW -->

</div>
<!-- CONTAINER -->
<?php include 'footer.php'; ?>
