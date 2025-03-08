<?php

function isHTTPS_Host(){
	if ($_SERVER['HTTPS'] == 'on') return true;
	if ($_SERVER['REQUEST_SCHEME'] == 'https') return true;
	if ($_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') return true;
	if (intval($_SERVER['SERVER_PORT']) == 443) return true;
	
	return false;
}

function isHTTPS_URL($URL = ''){
	
	$URL = strtolower_x(trim_x($URL));
	
	if (strpos($URL, 'https://') === 0) return true;
	
	return false;
}

?>