<?php



function printMsg($string = ''){
	
	$string = trim_x($string);
	
	if (php_sapi_name() === 'cli'){
		return "{$string}" . PHP_EOL;	
	} else {
		return "\n\n\n<p>{$string}</p>\n\n\n";
	}
}

function printrExpress($array = NULL, $sortKey = 0){
	if ($sortKey){
		natksort($array);
	}
	
	if (php_sapi_name() === 'cli'){
		return print_r($array, true);	
	} else {
		return "<pre>" . print_r($array, true) . "</pre>";
	}
}



function enableDebugMode(){
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED);
	return true;
}

?>