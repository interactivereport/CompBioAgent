<?php

//mysqli_free_result()
function mysqli_free_result_x($result = NULL){
    if (gettype($result) != 'boolean'){
		mysqli_free_result($result);
	}
}

?>