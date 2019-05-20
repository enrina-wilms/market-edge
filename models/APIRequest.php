<?php 
require_once '../../config_test.php';
require_once 'portfolio.php';
require_once 'watchlist.php';

class APIRequest{
    //get market price function
    public function getPortfolioMarketPrice(){
        $userid = $_SESSION['uid'];

        $API = "https://cloud.iexapis.com/beta/stock/market/batch?token=pk_16658a7d0d894548ac6fc648d4126581&symbols=";
        $API_type = "&types=price";
        
        //getting the ticker from the portfolio table
        $dbcon = Database::getDb();
        $portfolio = new Portfolio();
        $portfolio = $portfolio->getPortfolio($dbcon, $userid);
        $tickers = "";
        foreach($portfolio as $port){
            $tickers.=  $port->ticker .",";
        }

        $API_query = $API . $tickers . $API_type;   
        return $API_query;
    }
    // get ticker quote function
    public function getTickerQuote($ticker){
        $API_query = "https://cloud.iexapis.com/beta/stock/market/batch?token=pk_16658a7d0d894548ac6fc648d4126581&symbols=". $ticker ."&types=quote";
        
        return $API_query;
    }
    
    //get data(open, close, high, low) fucntion
    public function getDataChart($ticker){
        $API_query = "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=". $ticker ."&apikey=Y6K29HWW8R4315MT";
        
        return $API_query;
    }

    public function getWatchlistMarketPrice(){
        $API = "https://cloud.iexapis.com/beta/stock/market/batch?token=pk_16658a7d0d894548ac6fc648d4126581&symbols=";
        $API_type = "&types=price";


        $dbcon = Database::getDb();
        $u = new Watchlist();
        $watchlist = $u->getWatchlist($dbcon);
        $tickers = "";
        foreach($watchlist as $watch){
            $tickers.=  $watch->ticker .",";
        }

        $API_query = $API . $tickers . $API_type;   

        return $API_query;
    }
}



