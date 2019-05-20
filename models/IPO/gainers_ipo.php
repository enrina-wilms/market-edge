<?php
Class GainersIPO{
	public function getAPIipo($ipo){
		
		$jsonIPO = file_get_contents ($ipo);
		$json = json_decode($jsonIPO, true);
		
		foreach($json['rawData'] as $ipos){
					
echo '<div class="card ipo-container">'
 . '<div class="card-body">'
 . '<h5 class="card-title">' . $ipos['companyName'] .'</h5>'
 . '<h6 class="card-subtitle mb-2 text-muted">' . "Expected" .": "  .$ipos['expectedDate'] .'</h6>'
 .'<h6 class="card-subtitle mb-2 text-muted">' . "Low price" . ": " . "$ " .$ipos['priceLow'] . '</h6>'
 .'<h6 class="card-subtitle mb-2 text-muted">' . "High price" . ": " . "$ " .$ipos['priceHigh'] . '</h6>'
 .'<h6 class="card-subtitle mb-2 text-muted">' . "Percent" . ": " .$ipos['percentOffered'] . "%" . '</h6>'
.'<p><a href="http://'. $ipos['url']. '" class="btn-dark btn-sm" taget="_blank">Go to Our Website</a></p>'

. '</div>'
. '</div>';
		}
	}	
}	
	
