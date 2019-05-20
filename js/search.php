<?php
if(isset($_POST['ticker'])){
    $request = $_POST["ticker"];

    $jsonurl = "https://www.alphavantage.co/query?function=SYMBOL_SEARCH&keywords=".$request."&apikey=Y6K29HWW8R4315MT";
    $json = file_get_contents($jsonurl);
    $tickers = json_decode($json,true);

    $data = array();
    foreach ($tickers['bestMatches'] as $ticker){
        $data[] = $ticker['1. symbol'] .' '. $ticker['2. name'];
    }; 

    echo json_encode($data);
}

?>