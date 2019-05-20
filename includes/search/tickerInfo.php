<?php
    //setting the values to empty
    $ticker_news = $grossprofit = $totalrevenue = $netincome = $currentassets = $totalassets = $cash = '';

    //search ticker form
    if(isset($_GET['searchTicker'])){
        $ticker = $_GET['ticker'];
    }

    //API query
    $api_company = 'https://cloud.iexapis.com/beta/stock/'.$ticker.'/company?token=pk_16658a7d0d894548ac6fc648d4126581';
    $api_keystats = 'https://cloud.iexapis.com/beta/stock/'.$ticker.'/stats?token=pk_16658a7d0d894548ac6fc648d4126581';
    $api_financial = 'https://cloud.iexapis.com/beta/stock/'.$ticker.'/financials?token=pk_16658a7d0d894548ac6fc648d4126581';
    $api_news = 'https://cloud.iexapis.com/beta/stock/'.$ticker.'/news?token=pk_16658a7d0d894548ac6fc648d4126581';

    //extracting company json
    $jsondata = file_get_contents ($api_company);
    $json = json_decode($jsondata, true); 

    //extracting key stats json
    $keystatsdata = file_get_contents ($api_keystats);
    $keystats = json_decode($keystatsdata, true);

    //extracting financial json
    $financialdata = file_get_contents ($api_financial);
    $financial = json_decode($financialdata, true);

    //extracting news json
    $newsdata = file_get_contents ($api_news);
    $news = json_decode($newsdata, true);
    
    //company
    $symbol = $json['symbol'];
    $website = $json['website'];
    $description =  $json['description'];
    $ceo =  $json['CEO'];
    $sector = $json['sector'];
    $exchange = $json['exchange'];
    
    //stats
    $week52change = round($keystats['week52change']*100,2).'%';
    $week52high = $keystats['week52high'];
    $week52low = $keystats['week52low'];
    $marketcap = convert_number($keystats['marketcap']);
    $employees = $keystats['employees'];
    $day200MA = $keystats['day200MovingAvg'];
    $day50MA = $keystats['day50MovingAvg'];
    $float = convert_number($keystats['float']);
    $avg10Vol = convert_number($keystats['avg10Volume']);
    $avg30Vol = $keystats['avg30Volume'];
    $eps = $keystats['ttmEPS'];
    $dividendrate = $keystats['ttmDividendRate'];
    $shares = convert_number($keystats['sharesOutstanding']);
    $year5 = round($keystats['year5ChangePercent']*100,2).'%';
    if ($year5 > 0 ){
        $color5 = "green";
    }else{$color5 = "#DC143C";};
    $year1 = round($keystats['year1ChangePercent']*100,2).'%';
    if ($year1 > 0 ){
        $color1 = "green";
    }else{$color1 = "#DC143C";};
    $ytd = round($keystats['ytdChangePercent']*100,2).'%';
    if ($ytd > 0 ){
        $colorytd = "green";
    }else{$colorytd = "#DC143C";};
    $month6 = round($keystats['month6ChangePercent']*100,2).'%';
    if ($month6 > 0 ){
        $colorm6 = "green";
    }else{$colorm6 = "#DC143C";};
    $month1 = round($keystats['month1ChangePercent']*100,2).'%'; 
    if ($month1 > 0 ){
        $colorm1 = "green";
    }else{$colorm1 = "#DC143C";};
    $day5 = round($keystats['day5ChangePercent']*100,2).'%';
    if ($day5 > 0 ){
        $colord = "green";
    }else{$colord = "#DC143C";};
    //$nextdividend = $keystats['nextDividendRate'];
    $dividendyeild = round($keystats['dividendYield']*100,2).'%';
    $nextearningdate = $keystats['nextEarningsDate'];
    $dividenddate = $keystats['exDividendDate'];
    $peratio = $keystats['peRatio'];

    //financial
    if (count($financial) != 0){
        foreach($financial['financials'] as $f){
            $grossprofit = convert_number($f['grossProfit']);    
            $totalrevenue = convert_number($f['totalRevenue']);
            $netincome = convert_number($f['netIncome']);
            $currentassets = convert_number($f['currentAssets']);
            $totalassets = convert_number($f['totalAssets']);
            $cash = convert_number($f['totalCash']);
        }
    }

    //news
    foreach($news as $n){
        $ticker_news .= '<a href="'.$n['url'].'?token=pk_2070ea1e812e4ed989df8082e86dc16d"><p>'. $n['headline'].'</p></a>';
    }

    //conver number to better looking data
    function convert_number($n) {
        if($n != ''){
            $n = (0+str_replace(",", "", $n));
        }

        //if (!is_numeric($n)) return false;

        if ($n > 1000000000000) return round(($n/1000000000000), 2).'T';
        elseif ($n > 1000000000) return round(($n/1000000000), 2).'B';
        elseif ($n > 1000000) return round(($n/1000000), 2).'M';
        elseif ($n > 1000) return round(($n/1000), 2).'Th';
        
        return number_format($n);
    }

