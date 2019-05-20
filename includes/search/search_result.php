<?php
    require_once '../../config_test.php';
    require_once 'header.php';
    require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/models/chart/displayChart.php');
    require_once 'tickerInfo.php';
    require_once '../../userSession.php';

    if (empty($userid)){
        header("location: ../loginRegistration/login.php");   
    }
?>
<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" href="../../js/alertifyjs/css/alertify.css">
	<link rel="stylesheet" href="../../js/alertifyjs/css/themes/default.css">
<script>
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
        <a href="<?php echo $website; ?>"><h2 class="chart-title"><?php echo $symbol; ?></h2></a>
        <h6 class="chart-subtitle"><?php echo $company; ?></h6>
        <span class="chart-price"><?php echo $latestPrice; ?></span>
        <span class="chart-data" style="color:<?php echo $color; ?>"><?php echo $change; ?></span>
        <span class="chart-data" style="color:<?php echo $color; ?>"><?php echo $changePercent; ?></span>
        <button type="button" class="btn btn-primary add-port" data-toggle="modal" data-target="#addTicker">Add to portfolio</button>
        <div id="chartContainer"></div>
        <div class="wrapper">
            <h3 class="desc">Description:</h3>
            <p><?php echo $description.'.'; ?></p> 
            <h3>CEO:</h3>
            <p><?php echo $ceo; ?></p>   
            <h3>Sector:</h3>
            <p><?php echo $sector; ?></p>  
        </div>
    </div>
    <div class="search-wrapper">
        <table class="table">
            <tr>
                <td class="a">Exchange</td>
                <td><?php echo $exchange; ?></td>
                <td class="a">52 Week %</td>
                <td><?php echo $week52change; ?></td>
                <td class="a">MA200</td>
                <td><?php echo $day200MA; ?></td>
                <td class="a">Perf 5 Year</td>
                <td style="color:<?php echo $color5; ?>"><?php echo $year5; ?></td>
                <td class="a">Yield</td>
                <td><?php echo $dividendyeild; ?></td>
            </tr>   
            <tr>
                <td class="a">Market Cap</td>
                <td><?php echo $marketcap ?></td> 
                <td class="a">52 Week High</td>
                <td><?php echo $week52high; ?></td>
                <td class="a">MA50</td>
                <td><?php echo $day50MA; ?></td>
                <td class="a">Perf 1 Year</td>
                <td style="color:<?php echo $color1; ?>"><?php echo $year1; ?></td>
                <td class="a">Next Dividend</td>
                <td>Null</td>
            </tr>   
            <tr>
                <td class="a">Shares</td>
                <td><?php echo $shares ?></td> 
                <td class="a">52 Week Low</td>
                <td><?php echo $week52low; ?></td>
                <td class="a">Avg10 Vol</td>
                <td><?php echo $avg10Vol; ?></td>
                <td class="a">Perf YTD</td>
                <td style="color:<?php echo $colorytd; ?>"><?php echo $ytd; ?></td>
                <td class="a">Dividend Rate</td>
                <td><?php echo $dividendrate ?></td>
            </tr>  
            <tr>
                <td class="a">Float</td>
                <td><?php echo $float ?></td> 
                <td class="a">Gross Profit</td>
                <td><?php echo $grossprofit; ?></td>
                <td class="a">Current Assets</td>
                <td><?php echo $currentassets; ?></td>
                <td class="a">Perf Half M</td>
                <td style="color:<?php echo $colorm6; ?>"><?php echo $month6; ?></td>
                <td class="a">Earnings</td>
                <td><?php echo $nextearningdate ?></td>
            </tr>
            <tr>
                <td class="a">EPS</td>
                <td><?php echo $eps ?></td> 
                <td class="a">Total Revenue</td>
                <td><?php echo $totalrevenue; ?></td>
                <td class="a">Total Assets</td>
                <td><?php echo $totalassets; ?></td>
                <td class="a">Perf Month</td>
                <td style="color:<?php echo $colorm1; ?>"><?php echo $month1; ?></td>
                <td class="a">Next Earning</td>
                <td><?php echo $nextearningdate ?></td>
            </tr> 
            <tr>
                <td class="a">Employees</td>
                <td><?php echo $employees ?></td> 
                <td class="a">Net Income</td>
                <td><?php echo $netincome; ?></td>
                <td class="a">Total Cash</td>
                <td><?php echo $cash; ?></td>
                <td class="a">Perf Week</td>
                <td style="color:<?php echo $colord; ?>"><?php echo $day5; ?></td>
                <td class="a">P/E</td>
                <td><?php echo  $peratio ?></td>
            </tr>                
        </table>    
    </div>
    <div class="search-wrapper search-news">
        <h3>Related News:</h3>
        <?php echo  $ticker_news; ?>
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