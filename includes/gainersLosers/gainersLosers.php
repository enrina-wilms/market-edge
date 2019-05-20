<?php 

require_once "../../userSession.php";
	
require_once '../../config_test.php';

require_once MODELS_GAINERSLOSERS_PATH . "/gainers-losers.php";

//API FOR THE STOCK MARKET TOP GAINERS FOR THAT DAY
$apiGainers = "https://cloud.iexapis.com/beta/stock/market/list/gainers?token=pk_dcc8631c1b9b4c1caa84dcbeb63d32b0";

//API FOR THE STOCK MARKET TOP LOSERS FOR THAT DAY
$apiLosers = "https://cloud.iexapis.com/beta/stock/market/list/losers?token=pk_dcc8631c1b9b4c1caa84dcbeb63d32b0";
                
$gainersObj = new GainersLosers();

require_once "header.php";
?>

<h1>Top Gainers/Losers</h1>

<div class="container-fluid">
	<div class="row">
		<ul class="nav nav-pills mb-3 nav-center" id="pills-tab" role="tablist">
			<!-- TAB LINK FOR THE GAINERS TABLE-->
			<li class="nav-item">
				<a class="nav-link active gainer-button-tab" id="pills-gainers-tab" data-toggle="pill" href="#pills-gainers" role="tab" aria-controls="pills-gainers" aria-selected="true">STOCK: TOP GAINERS</a>
			</li>
			<!-- TAB LINK FOR THE LOSERS TABLE-->
			<li class="nav-item">
				<a class="nav-link gainer-button-tab" id="pills-losers-tab" data-toggle="pill" href="#pills-losers" role="tab" aria-controls="pills-losers" aria-selected="false">STOCK: TOP LOSERS</a>
			</li>
		</ul>

		<!-- TAB CONTAINER FOR THE TABLES WHERE IT DISPLAYS DATA-->
		<div class="tab-content container-fluid tab-overwrite" id="pills-tabContent">
			<div class="tab-pane fade show active" id="pills-gainers" role="tabpanel" aria-labelledby="pills-gainers-tab">
				<!-- AREA WHERE GAINERS TABLE TAB DISPLAY-->
				<?php 
                 $gainers = $gainersObj->getAPIGainers($apiGainers);
                ?>
			</div>
			<div class="tab-pane fade" id="pills-losers" role="tabpanel" aria-labelledby="pills-losers-tab">

				<!-- AREA WHERE THE LOSER TABLE TAB DISPLAY-->
				<?php 
                  $losers = $gainersObj->getAPIGainers($apiLosers);
                ?>
			</div>
		</div>
	</div>
</div>

<?php require_once "footer.php"; ?>
