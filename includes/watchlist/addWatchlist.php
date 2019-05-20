<?php
require_once '../../config_test.php';
require_once 'watchlist.php';
require_once '../../userSession.php';

    if(isset($_POST['add_watchlist'])){
        $dbcon = Database::getDb();
        
        $ticker = filter_var($_POST['ticker'], FILTER_SANITIZE_STRING);
        $company = filter_var($_POST['company'], FILTER_SANITIZE_STRING); 
        $u = new Watchlist();
        $u->addTicker( $ticker, $company, $dbcon, $userid);
        
        if($ticker !='' && $company !=''){
            header("Location: watchlistView.php");
        }
        
        
    }