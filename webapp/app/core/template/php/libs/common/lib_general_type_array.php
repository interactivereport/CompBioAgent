<?php

//Natural sort an array by key
function natksort(&$array = NULL){
	if (is_array($array)){
		uksort($array, 'strnatcasecmp_x');
	}
	
	return true;
}

//Natural sort an array by value
function natural_sort(&$array = NULL){
	if (is_array($array)){
		natcasesort($array);
	}
	
	return true;
}

function array_size($array = NULL){
	if (is_array($array)){
		return intval(sizeof($array));
	} else {
		return 0;	
	}
}

function in_arrayi($needle = '', $haystack = ''){
	if (is_array($haystack)){
		foreach ($haystack as $tempKey => $value){
			if (strtolower_x($value) == strtolower_x($needle)) return true;
		}
	}
    return false;
}

function array_clean($array = array(), $addslashes = 0, $unique = 1, $sort = 0, $preserveKey = 0){

	if (array_size($array) > 0){
		$array = array_map('trim', $array);
		if ($addslashes){
			$array = array_map('addslashes', $array);
		}
		$array = array_filter($array, 'strlen');
		if ($unique){
			$array = array_iunique($array);
		}
		
		if ($sort){
			natcasesort($array);	
		}
		
		if (!$preserveKey){
			$array = array_values_x($array);
		}
	}
	
	return $array;
}

function array_iunique($array = array(), $case = 0) {
	
	if (is_array($array)){
		if ($case == 0){
			return array_intersect_key(
				$array,
				array_unique( array_map( "strtolower", $array ) )
			);
		} else {
			return array_intersect_key(
				$array,
				array_unique( array_map( "strtoupper", $array ) )
			);
		}
	} else {
		return $array;
	}
}




function array_merge2($array1 = array(), $array2 = array()){
	
	$arraySize1 = array_size($array1);
	$arraySize2 = array_size($array2);
	
	if (($arraySize1 > 0) && ($arraySize2 > 0)){
		return array_merge($array1, $array2);	
	} elseif ($arraySize1 > 0){
		return $array1;	
	} elseif ($arraySize2 > 0){
		return $array2;	
	} else {
		return false;	
	}
}

function array_is_empty($array = array()){
	
	if (is_array($array)){
		$test = array_filter($array, 'trim');	
		
		if (array_size($test) <= 0){
			return true;
		} else {
			return false;	
		}
	} else {
		return false;	
	}
	
}



function get_first_array_key($array = array()){
	
	$first_array_key = array_keys_x($array);
	return $first_array_key[0];
	
}


function get_first_array_element($array = array()){
	$first_array_key = get_first_array_key($array);
	return $array[$first_array_key];
}


function get_last_array_key($array = array()){
	if (function_exists_x('array_key_last')){
		return array_key_last($array);
	} else {
		$last_array_key = array_keys_x($array);
		return $last_array_key[sizeof($array)-1];
	}
}


function get_last_array_element($array = array()){
	$last_array_key = get_last_array_key($array);
	return $array[$last_array_key];
}


function get_2d_array_keys($array = array()){
	return array_keys_x(get_first_array_element($array));
}


function sort_array_by_key_with_reference($array = array(), $order = array()){

	uksort($array, function($a, $b) use ($order){
		
		$valA = array_search($a, $order);
		$valB = array_search($b, $order);
	
		if (($valA === false) || ($valB === false)){
			if (($valA === false) && ($valB === false)){
				$results = 0;
			} elseif ($valA === false){
				$results = 1;
			} elseif ($valB === false){
				$results = -1;	
			}
		} else {
			
			if ($valA == $valB){
				$results = 0;
			} elseif ($valA > $valB){
				$results = 1;
			} elseif ($valA < $valB){
				$results = -1;
			}
		}
		
		return $results;
		
		
	});
	
	return $array;
}


function array_searchi($needle = NULL, $haystack = array(), $strict = false){
	
	return array_search_x(strtolower_x($needle), array_map('strtolower', $haystack), $strict);
	
}

?>