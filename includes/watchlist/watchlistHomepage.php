<?php 
    ob_start();
    require_once '../../config_test.php';
    require_once 'header.php';
    require_once '../../userSession.php';
?>
<table class="table-hover homepage-table">
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