<?php 
    ob_start();
    require_once '../../config_test.php';
    require_once 'header.php';
    require_once '../../userSession.php';
?>
<h1>Watchlist</h1>
<i class="fas fa-plus" data-toggle="modal" data-target="#exampleModalCenter"></i>
<a href="editWatchlistView.php"><i class="fas fa-cog"></i></a>
<table class="table-hover">
    <thead>
        <tr>
            <th>Ticker</th>
            <th>Company</th>
            <th>Market Price</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            require_once 'listWatchlist.php';
        ?>
    </tbody>
</table>
<div class="port-wrapper">
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add Ticker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="addWatchlist.php" method="post" id="addWatchlistModal">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Ticker</span>
                        </div>
                        <input type="text" name="ticker" id="pName" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Company</span>
                        </div>
                        <input type="text" name="company" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" name="add_watchlist" value="Add Ticker">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    
    require_once 'footer.php';
?>
