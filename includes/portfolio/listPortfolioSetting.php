<?php
//require_once '../../userSession.php';
require_once '../../config_test.php';
require_once 'portfolio.php';
require_once 'APIRequest.php';


$dbcon = Database::getDb();

//caliing the get portfolio function from portfolio model and passing the current user id
$list = new Portfolio();
$portfolio = $list->getPortfolio($dbcon,$userid);

//requesting the api query
$p = new APIRequest();
$price = $p->getPortfolioMarketPrice();

//if api json array return 0 display notthing else display user portfolio
if(count($portfolio) != 0){
    //extracting the json api data
    $jsondata = file_get_contents ($price);
    $json = json_decode($jsondata, true);

    //sotring the ticker price in the array
    $tickers_price = array();
    foreach($json as $ticker) {
        $tickers_price[] = $ticker['price'];
    }
    //looping through the API return data and displaying it in the table
    foreach($portfolio as $price => $port){
        echo "<tr> <td style='display:none;'>". $port->id ."</td>"
                ."<td style='color:#ffeaa7;'>". $port->ticker ."</td>"
                ."<td style='color:#fff;'>". $port->company ."</td>"
                ."<td>". $port->shares ."</td>"
                ."<td>$". $port->price ."</td>"
                ."<td>$". $port->price * $port->shares ."</td>"
                ."<td>$". $tickers_price[$price] ."</td>"
                ."<td>$". $tickers_price[$price] * $port->shares ."</td>"
                ."<td>". (($tickers_price[$price] * $port->shares) - ($port->price * $port->shares)  )."</td>"
                ."<td>
                    <button type='submit' name='editTicker' class='edit-btn' data-toggle='modal' data-target='#editModal'>
                        <i class='far fa-edit'></i>
                    </button> 
                </td>
                <td>
                    <button type='submit' name='deleteTicker' class='delete-btn' data-toggle='modal' data-target='#deleteModal'>
                    <i class='far fa-trash-alt'></i></button>                
                </td></tr>";
    }
}
