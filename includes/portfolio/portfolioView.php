<?php 
    ob_start();
//	require_once '../../userSession.php';
    require_once '../../config_test.php';
    require_once 'header.php';
    
?>
<h1>Portfolio</h1>
<i class="fas fa-plus" data-toggle="modal" data-target="#exampleModalCenter"></i>
<a href="editPortfolioView.php"><i class="fas fa-cog"></i></a>
<table class="table-hover">
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
<br>
<div class="container">
    <div class="row dividend-row">
             <?php include '../APIDividend/Dividend.php'; ?>
    </div>
</div>
<div class="min-wrapper"></div>

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
                <form action="addPortfolio.php" method="post" id="addPortfolioModal">
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
                        <input type="text" name="price" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" name="add_portfolio" value="Add Ticker">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php  
    require_once 'footer.php';
?>
