<?php

function mktime_x($hour = NULL, $minute = NULL, $second = NULL, $month = NULL, $day = NULL, $year = NULL){
	
	$hour = intval($hour);
	$minute = intval($minute);
	$second = intval($second);
	$month = intval($month);
	$day = intval($day);
	$year = intval($year);

	return mktime($hour, $minute, $second, $month, $day, $year);
	
}



?>