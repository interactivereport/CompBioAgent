<?php

function abs_x($num = 0){
	
	if (is_float($num) || is_int($num)){
		return abs($num);	
	} elseif (is_numeric($num)){
		return abs(floatval($num));
	} else {
		return 0;	
	}
}

?>