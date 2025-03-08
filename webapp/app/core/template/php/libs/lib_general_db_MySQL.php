<?php


function executeSQL($SQL = ''){

	global $APP_CONFIG;
	
	if ($SQL == '') return false;
	
	return $APP_CONFIG['SQL_DATA_CONN']->Execute($SQL);	
}

function getInsertSQLQuery($SQL_TABLE = '', $dataArray = array(), $header = NULL, $trim = 1, $addslashes = 1, $SQL_DB = ''){
	
	
	if ($SQL_DB == ''){
		$SQL = "INSERT INTO `{$SQL_TABLE}` ";
	} else {
		$SQL = "INSERT INTO `{$SQL_DB}`.`{$SQL_TABLE}` ";
	}
	
	
	foreach($dataArray as $key => $value){
		if ($trim){
			$value		 = trim_x($value);
		}
		
		if ($addslashes){
			$value		 = addslashes_x($value);
		}
		
		$dataArray[$key] = $value;
	}
	
	
	if (array_size($header) > 0){
		$SQL_COLUMN_STRING = '(`' . implode_x('`, `', $header) . '`)';		
	} else {
		$SQL_COLUMN_STRING = '(`' . implode_x('`, `', array_keys($dataArray)) . '`)';
	}

	$SQL .= "{$SQL_COLUMN_STRING} VALUES ";
	
	$SQL_VALUE_STRING = "('" . implode_x("', '", array_values($dataArray)) . "')";
	
	$SQL .= "{$SQL_VALUE_STRING}";
	
	return $SQL;
}


function getReplaceSQLQuery($SQL_TABLE = '', $dataArray = array(), $header = '', $trim = 1, $addslashes = 1, $SQL_DB = ''){
	
	if ($SQL_DB == ''){
		$SQL = "REPLACE INTO `{$SQL_TABLE}` ";
	} else {
		$SQL = "REPLACE INTO `{$SQL_DB}`.`{$SQL_TABLE}` ";
	}
	
	foreach($dataArray as $key => $value){
		if ($trim){
			$value		 = trim_x($value);
		}
		
		if ($addslashes){
			$value		 = addslashes_x($value);
		}
		
		$dataArray[$key] = $value;
	}
	
	if (array_size($header) > 0){
		$SQL_COLUMN_STRING = '(`' . implode_x('`, `', $header) . '`)';		
	} else {
		$SQL_COLUMN_STRING = '(`' . implode_x('`, `', array_keys($dataArray)) . '`)';
	}

	$SQL .= "{$SQL_COLUMN_STRING} VALUES ";
	
	$SQL_VALUE_STRING = "('" . implode_x("', '", array_values($dataArray)) . "')";
	
	$SQL .= "{$SQL_VALUE_STRING}";
	
	return $SQL;
}


function getUpdateSQLQuery($SQL_TABLE = '', $dataArray = array(), $ID = NULL, $trim = 1, $ID_Field = 'ID', $SQL_DB = ''){
	
	
	
	if ($SQL_DB == ''){
		$SQL = "UPDATE `{$SQL_TABLE}` SET ";
	} else {
		$SQL = "UPDATE `{$SQL_DB}`.`{$SQL_TABLE}` SET ";
	}
	
	
	foreach($dataArray as $key => $value){
		if ($SQL_VALUE_STRING != '') $SQL_VALUE_STRING .= ', ';
		
		if ($trim){
			$value		 = trim_x($value);
		}
		
		$value = addslashes_x($value);
		
		$SQL_VALUE_STRING .= "`{$key}` = '{$value}'";
		
	}
	
	$SQL .= "{$SQL_VALUE_STRING} WHERE `{$ID_Field}` ";
	
	if (is_array($ID)){
		$ID = array_filter($ID);
		$ID = array_unique($ID);
		$ID = array_filter($ID, 'is_numeric');
		$ID = implode_x(',', $ID);
		
		$SQL .= " IN ({$ID})";
		
	} else {
		
		$ID = intval($ID);
		
		$SQL .= " = {$ID}";
	}
	
	return $SQL;
}



//Return unique values of all records
function getUniqueColumnValues($SQL_TABLE = '', $SQL_COLUMN = '', $cache = 0){
	
	global $APP_CONFIG;
	
	$extraFilter = $APP_CONFIG["{$SQL_TABLE}_Extra_Filter"];
	
	if ($extraFilter == ''){
		$SQL = "SELECT DISTINCT (`{$SQL_COLUMN}`) FROM `{$SQL_TABLE}`";
	} else {
		$SQL = "SELECT `{$SQL_COLUMN}` FROM `{$SQL_TABLE}` WHERE ({$extraFilter}) GROUP BY `{$SQL_COLUMN}`";
	}

	$results = getSQL_Data($SQL, 'GetCol', $cache);
	
	return array_clean($results);
}





function getSQL_Data($SQL = '', $type = '', $cache = 0, $table = ''){
	
	global $APP_CONFIG, $APP_CACHE, $BXAF_CONFIG;
	
	$cacheKey = __FUNCTION__ . '::' . md5_x($SQL . '::' . $type);
	
	if ($APP_CONFIG['LONG_CACHE_NAME']){
		$cacheKey = __FUNCTION__ . '::' . $SQL . '::' . $type;
	}

	if ($cache && !$APP_CONFIG['CACHE_OFF']){
		
		if (isset($APP_CACHE[__FUNCTION__][$cacheKey])){
			return $APP_CACHE[__FUNCTION__][$cacheKey];
		}

		
	}


	if ($type == 'GetOne'){
		$results = $APP_CONFIG['SQL_DATA_CONN']->GetOne($SQL);
		$json_decode_assoc = 0;
	} elseif ($type == 'GetAssoc'){
		$results = $APP_CONFIG['SQL_DATA_CONN']->GetAssoc($SQL);
		$json_decode_assoc = 1;
	} elseif ($type == 'GetArray'){
		$results = $APP_CONFIG['SQL_DATA_CONN']->GetArray($SQL);
		$json_decode_assoc = 1;
	} elseif ($type == 'GetCol'){
		$results = $APP_CONFIG['SQL_DATA_CONN']->GetCol($SQL);
		$json_decode_assoc = 1;
	} elseif ($type == 'GetRow'){
		$results = $APP_CONFIG['SQL_DATA_CONN']->GetRow($SQL);
		$json_decode_assoc = 1;
	}
	
	
	$APP_CACHE[__FUNCTION__][$cacheKey] = $results;
	
	
	
	return $results;
}





?>