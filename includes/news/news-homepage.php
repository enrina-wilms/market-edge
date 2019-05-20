<?php
	
	require_once '../../config_test.php';

	require_once MODELS_NEWS_PATH . "/news-homepage.php";
	
	//RSS NEWSFEED LINKS
	$rss1 = "http://feeds.marketwatch.com/marketwatch/marketpulse/";	
	$rss2 = "http://ir.nasdaq.com/rss/news-releases.xml?items=15";
	//these link is not working at the moment
	//$rss2 = "http://articlefeeds.nasdaq.com/nasdaq/categories?category=Stocks";
	$rss3 = "http://feeds.reuters.com/news/wealth";
	

	$newsObj = new StockMarketNews();
?>

<div class="container">
	
			<div id="news-container" class="row">
					<!-- AREA WHERE THE LIST OF NEWS ARTICLES WILL BE DISPLAYED-->
					<?php $newsObj->getAllNews($rss1); ?>
	
	</div>
</div>

