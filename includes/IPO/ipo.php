<?php 

require_once "../../models/IPO/gainers_ipo.php";

$IPO = "https://cloud.iexapis.com/beta/stock/market/upcoming-ipos?token=pk_82f6dc15ab3b4c619b3e294195653d51";

                
$i = new GainersIPO();
 
?>


	<?php


$i = $i->getAPIipo($IPO);






    
	?>