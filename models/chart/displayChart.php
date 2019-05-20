<?php 
    require_once '../../config_test.php';
    require_once 'APIRequest.php';
    
    //setting the default time
    date_default_timezone_set('America/Los_Angeles'); 

    //setting the default ticker to display when user visit chart page
    $ticker = 'SPY';
    $change = $company = $changePercent = $symbol ='';

    //setting the search form data
    if(isset($_GET['searchTicker'])){
        $ticker = $_GET['ticker'];
    }
    $api = new APIRequest();
    //getting the data and quote for the ticker
    $data = $api->getDataChart($ticker);
    $quote = $api->getTickerQuote($ticker);

    //extracting the api json array (data)
    $jsondata = file_get_contents ($data);
    $json = json_decode($jsondata, true);

    //extracting the api json array (quote)
    $quotedata = file_get_contents ($quote);
    $quotejson = json_decode($quotedata, true);

    //looping through the api return data
    foreach($quotejson as $value){
        //storing the data in the variables
        $symbol = $value['quote']['symbol'];
        $company = $value['quote']['companyName'];
        $latestPrice = '$'.$value['quote']['latestPrice'];
        $latest = $value['quote']['latestPrice'];
        $changes = $value['quote']['change'];

        //setting the icons and color of the ticker if its up or down during the day
        if ($changes < 0){
            $color = "red";  
            $change = '<i class="fas fa-arrow-down"></i>'.round($value['quote']['change'],2);
            $changePercent = '('.round($value['quote']['changePercent']*100,2).'%)';

        }else if ($changes > 0){
            $color = "green";
            $change = '<i class="fas fa-arrow-up"></i>'.round($value['quote']['change'],2);
            $changePercent = '(+'.round($value['quote']['changePercent']*100,2).'%)';
        }
    }
       
    //looping through the api return data - this is the daily data for the ticker - open, close, high, low
    foreach($json['Time Series (Daily)'] as $key => $value){
        $date = strtotime($key);
        $open = $value['1. open'];
        $high = $value['2. high'];
        $low = $value['3. low'];
        $close = $value['4. close']; 

        $dataPoints [] = array("x" => $date.'000', "y" => array($open ,$high ,$low ,$close));
    }    
?>