<?php 
    ob_start();
    require_once '../../config_test.php';
//    require_once '../../userSession.php';
?>
<table class="table-hover homepage-table">
    <thead>
        <tr>
            <th>Ticker</th>
            <th>Company</th>
            <th>Shares</th>
            <th>Price</th>
            <th>Initial Value</th>
            <th>Market Price</th>
            <th>Market Value</th>
            <th>P/L</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            require_once 'listPortfolio.php';
        ?>
    </tbody>
</table>

