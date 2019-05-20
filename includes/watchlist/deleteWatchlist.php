<?php
ob_start();
require_once '../../config_test.php';
require_once 'listWatchlistSetting.php';

if(isset($_POST['deleteTicker'])){
    $dbcon = Database::getDb();
    $id= $_POST['ticker_id'];

    $p = new Watchlist();
    $count = $p->deleteTicker($dbcon, $id);
    
    if($count){
        header("Location:editWatchlistView.php");      
    } else {
        echo  "problem updating";
    }     
}
?>
<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModal">Delete Ticker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="deleteWatchlist.php" method="post">
                   <input type="hidden" name="ticker_id" id="del_ticker_id">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Ticker</span>
                        </div>
                        <input type="text" name="ticker" id="del_ticker" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Company</span>
                        </div>
                        <input type="text" name="company" id="del_company" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-danger" name="deleteTicker" value="Delete Ticker">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>    