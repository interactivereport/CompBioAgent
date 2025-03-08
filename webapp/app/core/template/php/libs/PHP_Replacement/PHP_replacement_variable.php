<?php

//unserialize
function unserialize_x($string = '', $options = array()){
	if (!is_scalar($string)){
		return FALSE;
	} else {
		return unserialize($string, $options);
	}
}

?>