<?php
require_once "../../config_test.php";
require_once "DividendListPortfolio.php";
require_once "DividendAPIRequest.php";


$tickers = "";
$tickersArray = array();
foreach($portfolio as $port){
  $tickers .= $port->ticker . ",";
  $tickersArray[] = $port->ticker;
}

$dividendRequest = new DividendAPIRequest();
$dividendData = $dividendRequest->getDividend($tickers);

if(count($portfolio) != 0){
    $jsondata = file_get_contents ($dividendData);
    $json = json_decode($jsondata, true); 

    foreach($tickersArray as $ticker){
      foreach($json[$ticker]['dividends'] as $value){
        echo
//        '<div class="dividend-container">' .
          '<div class="card col-md-4" style="width: 100%;">' 
          . '<div class="card-body dividend">'
            . '<h5 class="card-title">' . $ticker .'</h5>' . '<h6 class="card-subtitle mb-2 text-muted">' . "Expected Date" .": "  .$value['exDate'] .'</h6>'
            . '<h6 class="card-subtitle mb-2 text-muted">' . "Payment Date" . ": " . "$ " .$value['paymentDate']. '</h6>'
            . '<h6 class="card-subtitle mb-2 text-muted">' . "Dividend Amount" . ": " . "$ " .$value['amount']. '</h6>'
          . '</div>'
        . '</div>';
        }
    }
}


?>
