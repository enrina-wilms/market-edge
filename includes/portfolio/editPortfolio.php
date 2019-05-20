<?php
ob_start(); 
//require_once '../../userSession.php';
require_once '../../config_test.php';
//require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/portfolio/listPortfolioSetting.php');
require_once INCLUDES_PORTFOLIO_PATH . '/listPortfolioSetting.php';

//edit ticker form

//update ticker form
if(isset($_POST['update_ticker'])){
    //data form update form
    $id= $_POST['ticker_id'];
    $ticker = $_POST['ticker'];
    $company = $_POST['company'];
    $shares = $_POST['shares'];
    $price = $_POST['price'];
    $dbcon = Database::getDb();
    
    //calling the editTicker function from the portfolio model and passing the data from the form
    $portfolio = new Portfolio();
    $count = $portfolio->editTicker($dbcon, $id, $ticker, $company, $shares, $price, $userid);
    //if succesfully updated go back to edit portfolio view else show the error
    if($count){
        header("Location:editportfolioView.php");
    } else {
        echo  "problem updating";
    }
}
?>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Ticker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="editTickerModal">
                   <input type="hidden" name="ticker_id" id="ticker_id">
                   <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Ticker</span>
                        </div>
                        <input type="text" name="ticker" id="edit_ticker" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Company</span>
                        </div>
                        <input type="text" name="company" id="company" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Shares</span>
                        </div>
                        <input type="text" name="shares" id="shares" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Price</span>
                        </div>
                        <input type="text" name="price" id="price" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" name="update_ticker" value="Update Ticker">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 