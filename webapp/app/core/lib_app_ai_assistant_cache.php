<?php

function save_ai_assistant_command_to_database($category = NULL, $cmd_parameters = NULL, $results = ''){
	
	global $BXAF_CONFIG, $APP_CONFIG;

	$category = intval($category);
	if ($category <= 0) return false;
	
	$cmd_parameters = trim_x($cmd_parameters);
	if ($cmd_parameters == '') return false;

	$results = trim_x($results);
	if ($results == '') return false;
	
	//Store the results to database
	if (true){
		$dataArray = array();
		$dataArray['Category'] 				= intval($category);
		$dataArray['Command'] 				= $cmd_parameters;
		$dataArray['Command_Checksum'] 		= hash('sha256', $cmd_parameters);
		$dataArray['Results'] 				= $results;

		$SQL = getReplaceSQLQuery($APP_CONFIG['TABLES']['APP_AI_ASSISTANT_CACHE'], $dataArray);
		
		executeSQL($SQL);
	}	

	return true;
}


function get_ai_assistant_command_from_database($category = NULL, $cmd_parameters = NULL){
	
	global $BXAF_CONFIG, $APP_CONFIG;
	
	$category = intval($category);
	if ($category <= 0) return false;
	
	$cmd_parameters = trim_x($cmd_parameters);
	if ($cmd_parameters == '') return false;

	$cmd_checksum = hash('sha256', $cmd_parameters);
	
	$SQL = "SELECT `Results` FROM `{$APP_CONFIG['TABLES']['APP_AI_ASSISTANT_CACHE']}` WHERE (`Category` = '{$category}') AND `Command_Checksum` = '{$cmd_checksum}' LIMIT 1";

	$result_string = getSQL_Data($SQL, 'GetOne', 1);
	
	return trim_x($result_string);
}


?>