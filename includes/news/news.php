<?php
	
	require_once "../../userSession.php";
	require_once '../../config_test.php';

	require_once MODELS_NEWS_PATH . "/news.php";
	require_once "header.php";
	
	//RSS NEWSFEED LINKS
	$rss1 = "http://feeds.marketwatch.com/marketwatch/marketpulse/";	
	$rss2 = "http://ir.nasdaq.com/rss/news-releases.xml?items=15";
	//these link is not working at the moment
	//$rss2 = "http://articlefeeds.nasdaq.com/nasdaq/categories?category=Stocks";
	$rss3 = "http://feeds.reuters.com/news/wealth";
	

	$newsObj = new StockMarketNews();
?>
<h1>News</h1>

<div class="container">
	<div class="row ">
		<ul class="nav nav-pills mb-3 nav-center nav-fill news-nav" id="pills-tab" role="tablist">
			<li class="nav-item">
				<a class="nav-link disabled" href="#">SELECT NEWS SOURCE:</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active news-button-tab" id="pills-marketwatch-tab" data-toggle="pill" href="#pills-marketwatch" role="tab" aria-controls="pills-marketwatch" aria-selected="true">MARKETWATCH</a>
			</li>
			<li class="nav-item">
				<a class="nav-link news-button-tab" id="pills-nasdaq-tab" data-toggle="pill" href="#pills-nasdaq" role="tab" aria-controls="pills-nasdaq" aria-selected="false">NASDAQ</a>
			</li>
			<li class="nav-item">
				<a class="nav-link news-button-tab" id="pills-reuters-tab" data-toggle="pill" href="#pills-reuters" role="tab" aria-controls="pills-reuters" aria-selected="false">REUTERS.COM</a>
			</li>
		</ul>
		<div class="tab-content" id="pills-tabContent">
			<div class="tab-pane fade show active" id="pills-marketwatch" role="tabpanel" aria-labelledby="pills-marketwatch-tab">
				<div id="news-container" class="row">
					<!-- AREA WHERE THE LIST OF NEWS ARTICLES WILL BE DISPLAYED-->
					<?php $newsObj->getAllNews($rss1); ?>
				</div>
			</div>
			<div class="tab-pane fade" id="pills-nasdaq" role="tabpanel" aria-labelledby="pills-nasdaq-tab">
				<div id="news-container" class="row">
					<!-- AREA WHERE THE LIST OF NEWS ARTICLES WILL BE DISPLAYED-->
					<?php $newsObj->getAllNews($rss2); ?>
				</div>
			</div>
			<div class="tab-pane fade" id="pills-reuters" role="tabpanel" aria-labelledby="pills-reuters-tab">
				<div id="news-container" class="row">
					<!-- AREA WHERE THE LIST OF NEWS ARTICLES WILL BE DISPLAYED-->
					<?php $newsObj->getAllNews($rss3); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once "footer.php"; ?>
