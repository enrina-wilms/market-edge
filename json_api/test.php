<?php
    $jsondata = file_get_contents ("https://cloud.iexapis.com/beta/stock/aapl/news?token=pk_2070ea1e812e4ed989df8082e86dc16d");
    $json = json_decode($jsondata, true);

    //step one: file_get_contents - gets the data from the api
    //step two: json_decode - parse the api data in php
    //step three: diaplay that mf, easy...lolz
    foreach($json as $news){
        echo "<h3><a href='www.google.ca'>" .$news['headline'] ."</a></h3>";
    }