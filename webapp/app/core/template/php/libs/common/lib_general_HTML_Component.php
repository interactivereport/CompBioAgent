<?php



function printFontAwesomeIcon($icon = '', $quoteType = 1, $fixWidth = 1){
	
	if ($fixWidth){
		$fixWidthClass = 'fa-fw';
	}

	if ($quoteType == 1){
		return "<i class='fa {$fixWidthClass} {$icon}' aria-hidden='true'></i>";
	} else {
		return "<i class=\"fa {$fixWidthClass} {$icon}\" aria-hidden=\"true\"></i>";
	}
}

function getAlerts($message = '', $type = 'danger', $class='col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12'){

	$results .= "<div class='row'>";
		$results .=  "<div class='{$class}'>";
			$results .=  "<br/>";
			$results .=  "<div class='alert alert-{$type}' role='alert'>";
				$results .=  $message;	
			$results .=  "</div>";
		$results .=  "</div>";
	$results .=  "</div>";	
	
	return $results;
}





?>