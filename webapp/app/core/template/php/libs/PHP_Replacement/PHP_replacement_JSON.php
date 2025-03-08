<?php

function json_decode_x($json = '', $associative = NULL, $depth = 512, $flags = 0){
	if (is_string($json)){
		return json_decode($json, $associative, $depth, $flags);	
	} else {
		return false;	
	}
}

?>