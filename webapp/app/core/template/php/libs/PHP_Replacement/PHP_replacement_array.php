<?php

//array_combine()
function array_combine_x($keys = array(), $values = array()){
	if (is_array($keys) && is_array($values)){
		
		if (sizeof($keys) == sizeof($values)){
			return array_combine($keys, $values);
		} else {
			return array_combine(array_intersect_key($keys, $values), array_intersect_key($values, $keys));	
		}
	} else {
		return array();	
	}
}

//array_column()
function array_column_x($array = array(), $column_key = NULL){
	if (is_array($array) && !empty($column_key)){	
		return array_column($array, $column_key);
	} else {
		return array();	
	}
}

//array_filter
function array_filter_x($array = array(), $callback = NULL, $mode = 0){
	if (is_array($array)){
		if (is_callable($callback)){
			return array_filter($array, $callback, $mode);
		} else {
			return array_filter($array);			
		}
	} else {
		return array();	
	}
}

//array_flip
function array_flip_x($array = array()){
	if (is_array($array)){
		return array_flip($array);
	} else{
		return array();
	}
}

//array_keys()
function array_keys_x($array = array()){
	if (is_array($array)){
		return array_keys($array);
	} else {
		return array();	
	}
}

//array_key_exists()
function array_key_exists_x($key = NULL, $array = array()){
	if (is_array($array)){
		return array_key_exists($key, $array);
	} else{
		return false;
	}
}

//array_merge()
function array_merge_x($array1 = array(), $array2 = array()){

	if (is_array($array1)){
		$arraySize1 = sizeof($array1);
	} else {
		$arraySize1 = 0;
	}
	
	if (is_array($array2)){
		$arraySize2 = sizeof($array2);
	} else {
		$arraySize2 = 0;
	}
	
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

//array_reverse()
function array_reverse_x($array = array(), $preserve_keys = false){
	if (is_array($array)){	
		return array_reverse($array, $preserve_keys);
	} else {
		return array();	
	}
}

//array_search
function array_search_x($needle = NULL, $haystack = array(), $strict = false){
	if (is_array($haystack)){
		return array_search($needle, $haystack, $strict);
	} else{
		return false;
	}
}

//array_slice()
function array_slice_x($array = array(), $offset = NULL, $length = NULL, $preserve_keys = false){
	if (is_array($array)){	
		return array_slice($array, $offset, $length, $preserve_keys);
	} else {
		return array();	
	}
}

//array_splice
function array_splice_x($array = array(), $offset = 0, $length = NULL, $replacement = array()){
    if (is_array($array)){
        return array_splice($array, $offset, $length, $replacement);
    } else {
        return array();
    }

}

//array_sum()
function array_sum_x($array = array()){
	if (is_array($array)){	
		return array_sum($array);
	} else {
		return 0;	
	}
}

//array_unique()
function array_unique_x($array = array()){
	if (is_array($array)){	
		return array_unique($array);
	} else {
		return $array;
	}
}

//array_values()
function array_values_x($array = array()){
	if (is_array($array)){
		return array_values($array);
	} else {
		return array();	
	}
}

//array_values()
function asort_x(&$array = array(), $flags = SORT_REGULAR){
	if (is_array($array)){
		asort($array, $flags);
	}
}

//count()
function count_x($value = array(), $mode = COUNT_NORMAL){
	if (function_exists('is_countable')){
		if (is_countable($value)){
			return count($value, $mode);
		} else {
			return 1;	
		}
	} else {
		if (is_array($value)){
			return count($value, $mode);
		} else {
			return 1;
		}
	}
}

//in_array()
function in_array_x($needle = '', $haystack = ''){
	if (is_array($haystack)){
		return in_array($needle, $haystack);
	} else {
		return false;	
	}
}

//krsort()
function krsort_x(&$array = NULL, $flags = SORT_REGULAR){
	if (is_array($array)){
		return krsort($array, $flags);
	} else {
		return true;	
	}
}

//ksort()
function ksort_x(&$array = NULL, $flags = SORT_REGULAR){
	if (is_array($array)){
		return ksort($array, $flags);
	} else {
		return true;	
	}
}

//reset()
function reset_x(&$array = array()){
	if (is_array($array)){
		return reset($array);
	} else{
		return false;
	}
}

//natsort
function natsort_x(&$array = array()){
	if (is_array($array)){
		natsort($array);
	}
	return true;
}

?>