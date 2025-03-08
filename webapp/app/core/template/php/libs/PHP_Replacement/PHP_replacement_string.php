<?php

//addslashes
function addslashes_x($string = ''){
	if (!is_scalar($string)){
		return '';
	} else {
		return addslashes($string);
	}
}


//chr
function chr_x($codepoint = 0){
	if (!is_int($codepoint)){
		return '';
	} else {
		return chr($codepoint);
	}
}

//explode
function explode_x($separator = '', $string = '', $limit = PHP_INT_MAX){
	
	if (is_scalar($string) && ($string != '') && ($separator != '')){
		return explode($separator, $string, $limit);
	} else {
		return array();
	}
}

function htmlspecialchars_x($string = '', $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, $encoding = NULL, $double_encode = true){

	if (is_scalar($string) && ($string != '')){
		return htmlspecialchars($string, $flags, $encoding, $coudlbe_encode);
	} else {
		return $string;	
	}
}

//implode
function implode_x($separator = '', $array = array()){
	if (is_array($array)){
		return implode($separator, $array);
	} else {
		return '';
	}
}

//ltrim
function ltrim_x($string = '', $characters = " \n\r\t\v\x00"){
	if (is_scalar($string)){
		return ltrim($string, $characters);
	} else {
		return '';
	}
}

function md5_x($string = '', $binary = false){
	if (!is_scalar($string)){
		return '';
	} else {
		return md5($string, $binary);
	}	
}

function nl2br_x($string = '', $use_xhtml = true){
	if (is_scalar($string)){
		return nl2br($string, $use_xhtml);
	} else {
		return '';
	}
}

//number_format
function number_format_x($num = 0, $decimals = 0, $decimal_separator = '.', $thousands_separator = ','){
	$num = floatval($num);
	return number_format($num, $decimals, $decimal_separator, $thousands_separator);
}

//rtrim
function rtrim_x($string = '', $characters = " \n\r\t\v\x00"){
	if (is_scalar($string)){
		return rtrim($string, $characters);
	} else {
		return '';
	}
}

//str_replace
function str_replace_x($search = NULL, $replace = NULL, $subject = NULL, &$count = NULL){
	if (is_null($search)){
		$search = '';	
	}
	
	if (is_null($replace)){
		$replace = '';	
	}
	
	if (is_null($subject)){
		$subject = '';	
	}
	
	if (is_scalar($search) && !is_scalar($replace)){
		return $subject;
	} else {
		return str_replace($search, $replace, $subject, $count);
	}
}

//strnatcasecmp
function strnatcasecmp_x($string1 = '', $string2 = ''){
	if (is_scalar($string1) && is_scalar($string2)){
		return strnatcasecmp($string1, $string2);
	} else {
		return NULL;	
	}
}

//strtolower
function strtolower_x($string = ''){
	if (!is_scalar($string)){
		return '';
	} else {
		return strtolower($string);
	}
}

//strtolower
function strtoupper_x($string = ''){
	if (!is_scalar($string)){
		return '';
	} else {
		return strtoupper($string);
	}
}

//trim
function trim_x($string = '', $characters = " \n\r\t\v\x00"){
	if (is_scalar($string)){
		return trim($string, $characters);
	} else {
		return '';
	}
}



?>