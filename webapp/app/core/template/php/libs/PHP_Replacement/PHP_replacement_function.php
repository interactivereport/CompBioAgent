<?php

function function_exists_x($function = ''){
	
	$function = trim_x($function);
	
	if ($function != ''){
		return function_exists($function);	
	} else {
		return false;
	}
}

?>