<?php 
    ob_start();
    require_once '../../config_test.php';
    require_once 'header.php';
    require_once '../../userSession.php';
?>
<h1>Edit Watchlist</h1>
<table class="table-hover">
    <thead>
        <tr>
            <th style="display:none;">ID</th>
            <th>Ticker</th>
            <th>Company</th>
            <th>Market Price</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            //adding the data to display in the table body
            require_once 'listWatchlistSetting.php';
            require_once 'deleteWatchlist.php';
        ?>
    </tbody>
</table>
<?php
include 'footer.php';
?>
