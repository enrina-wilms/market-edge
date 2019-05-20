<?php
    require_once '../../config_test.php';
    require_once 'header.php';
    require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/models/chart/displayChart.php');
?>
<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" href="../../js/alertifyjs/css/alertify.css">
	<link rel="stylesheet" href="../../js/alertifyjs/css/themes/default.css">
<script>
//loading the script function
window.onload = function() {
var chart = new CanvasJS.Chart("chartContainer", {
	axisX: {
		valueFormatString: "DD MMM YY"
	},
    zoomEnabled:true,
    animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	axisY: {
        title: "Price",
		includeZero: false,
        prefix: "$"
	},
    axisX: {
		interval: 1,
    },
	data: [{
		type: "candlestick",
		xValueType: "dateTime",
        showInLegend: true,
		yValueFormatString: "$##0.00",
		xValueFormatString: "DD MMM YY",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
}
</script>
</head>
<body>
    <div class="container">
        <h2 class="chart-title"><?php echo $symbol; ?></h2>
        <h6 class="chart-subtitle"><?php echo $company; ?></h6>
        <span class="chart-price"><?php echo $latestPrice; ?></span>
        <span class="chart-data" style="color:<?php echo $color; ?>"><?php echo $change; ?></span>
        <span class="chart-data" style="color:<?php echo $color; ?>"><?php echo $changePercent; ?></span>
        <div class="container">
            <div class="chart-wrapper">
                <form action="" method="get">
                    <input class="form-control chart-search" name="ticker" type="text" placeholder="Search ticker" aria-label="Search">  
                    <input type="submit" hidden="hidden" name="searchTicker">
                    <div class="row-chart">
                        <button type="button" class="btn btn-primary add-port" data-toggle="modal" data-target="#addTicker">Add to portfolio</button>
                        <button type="button" class="btn btn-success add-watch">Add to watchlist</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="chartContainer"></div>
    </div>
<!-- Modal -->
<div class="modal fade" id="addTicker" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add Ticker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <iframe name="votar" style="display:none;"></iframe>

                <form class="ajax" target="votar">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Ticker</span>
                        </div>
                        <input type="text" name="ticker" id="pName" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $symbol; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Company</span>
                        </div>
                        <input type="text" name="company" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $company; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Shares</span>
                        </div>
                        <input type="text" name="shares" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                            <span class="input-group-text">0.00</span>
                        </div>
                        <input type="text" name="price" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" value="<?php echo $latest; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" name="add_portfolio" value="Add Ticker" id="addTicker">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="../../js/portfolio.js"></script>
    <script src="../../js/alertifyjs/alertify.js"></script>
</body>
</html>  
<?php require_once "footer.php" ?>

