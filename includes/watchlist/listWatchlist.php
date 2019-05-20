<?php
    
    require_once '../../config_test.php';  
    require_once 'database.php';
    require_once 'watchlist.php';
    require_once 'APIRequest.php';

$dbcon = Database::getDb();
$u = new Watchlist();
$watchlist = $u->getWatchlist($dbcon);

$p = new APIRequest();
$price = $p->getWatchlistMarketPrice();

//$jsondata = file_get_contents ($price);
//$json = json_decode($jsondata, true);

//if api json array return 0 display notthing else display user Watchlist
if(count($watchlist) != 0){
    //extracting the json api data
    $jsondata = file_get_contents ($price);
    $json = json_decode($jsondata, true);

    //sotring the ticker price in the array
    $tickers_price = array();
    foreach($json as $ticker) {
        $tickers_price[] = $ticker['price'];
    }

    foreach($watchlist as $price => $watch){
        echo "<tr> <td style='display:none;'>". $watch->id ."</td>"
                ."<td class='gainer-ticker'>". $watch->ticker ."</td>"
                ."<td class='gainer-company'>". $watch->company ."</td>"
                ."<td>$". $tickers_price[$price] ."</td></tr>";
    }
}
else{
    echo"<h2>No watchlist added yet.....</h2>";
}




 