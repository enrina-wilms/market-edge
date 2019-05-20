<?php
require_once '../../config_test.php';
require_once 'portfolio.php';
//require_once '../../userSession.php';

//if form is set add the portfolio
if(isset($_POST['add_portfolio'])){
    $dbcon = Database::getDb();

    //get data from the form
    $ticker = $_POST['ticker'];
    $company = $_POST['company'];
    $shares = $_POST['shares'];
    $price = $_POST['price'];

    //call the addTicker function from the portfolio model and pass in the data from the form.
    $add = new Portfolio();
    $add->addTicker($dbcon, $ticker, $company, $shares, $price, $userid);

    //once added go back to portfolio view
    if($ticker !='' && $company !='' && $shares !='' && $price !=''){
        header("Location: portfolioView.php");
    }    
}