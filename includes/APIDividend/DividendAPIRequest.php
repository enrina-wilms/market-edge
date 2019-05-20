<?php


class DividendAPIRequest{
    public function getDividend($ticker){
        //$ticker goes into () as argument

        $API = "https://cloud.iexapis.com/beta/stock/market/batch/?token=pk_16658a7d0d894548ac6fc648d4126581&symbols=" . $ticker . "&types=dividends&range=ytd"; 
         return $API; 
    }

}
/*This class method pulls from a stock market API and uses the ticker variable to put in the company ticker into the URL to pull from specific companies.
 In Dividend.php  we call this method then decode the json and then display it to the Portfolio page inside some bottstrap classes.*/