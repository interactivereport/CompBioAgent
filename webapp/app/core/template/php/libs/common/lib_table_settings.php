<?php

function initialize_default_settings($database_mode = 'MySQL'){
	
	global $APP_CONFIG, $BXAF_CONFIG, $PAGE;
	global $ID, $id;
	
	ini_set('memory_limit', -1);
	
	if (isset($_GET['devel'])){
		if ($_GET['devel'] == 1){
			$enableDebugMode = true;
		} else {
			$enableDebugMode = false;
		}
	} elseif ($_SESSION['devel'] || $_SESSION['DEBUG_MODE']){
		$enableDebugMode = true;
	} else {
		$enableDebugMode = false;	
	}
	
	if ($enableDebugMode){
		$_SESSION['devel'] = $_SESSION['DEBUG_MODE'] = true;
		ini_set('display_startup_errors', 1);
		ini_set('display_errors', 1);
		error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & E_DEPRECATED);	
	} else {
		$_SESSION['devel'] = $_SESSION['DEBUG_MODE'] = false;
		ini_set('display_startup_errors', 0);
		ini_set('display_errors', 0);
		error_reporting(0);
	}
	
	
	
	$APP_CONFIG['StartTime'] 			= microtime(true);
	$APP_CONFIG['APP_CURRENT_DIR'] 		= dirname(__FILE__);
	$APP_CONFIG['APP_CURRENT_DIR'] 		= explode('/', $APP_CONFIG['APP_CURRENT_DIR']);
	$APP_CONFIG['APP_CURRENT_DIR'] 		= array_pop($APP_CONFIG['APP_CURRENT_DIR']);
	$APP_CONFIG['APP_DIR'] 				= __DIR__ . '/';
	$APP_CONFIG['APP_URL'] 				= "//{$_SERVER['HTTP_HOST']}" . dirname($_SERVER['REQUEST_URI']) . '/';
	
	if (isHTTPS_Host()){
		$APP_CONFIG['APP_URL_HOST'] 	= "https://{$_SERVER['HTTP_HOST']}/";
	} else {
		$APP_CONFIG['APP_URL_HOST'] 	= "http://{$_SERVER['HTTP_HOST']}/";
	}
	
	$BXAF_CONFIG['BXAF_PAGE_TITLE'] 	= '';
	$BXAF_CONFIG['BXAF_PAGE_SPLIT']		= false;
	$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['style'] = true;
	
	
	if (($BXAF_CONFIG['BXAF_DB_DRIVER'] == 'mysql') && ($BXAF_CONFIG['APP_DB_NAME'] != '')){
		$APP_CONFIG['SQL_USER_CONN'] = bxaf_get_app_db_connection();
	}
	
	$database_mode = trim_x($database_mode);
	if ($database_mode == ''){
		$database_mode = 'MySQL';
	}
	
	if ($database_mode == 'MySQL'){
		try {
			$APP_CONFIG['SQL_DATA_CONN'] = bxaf_get_app_db_connection();
			$hasSQLConn = true;
		} catch (Exception $e) {
			die( $e->getMessage() );
		}
	} elseif (($database_mode == 'SQLite3') && ($BXAF_CONFIG['APP_DB_NAME'] != '')){
		try {
			$APP_CONFIG['SQL_DATA_CONN'] = new SQLite3($BXAF_CONFIG['APP_DB_NAME']);
			$hasSQLConn = true;
		} catch (Exception $e) {
			die( $e->getMessage() );
		}
	}

	
	load_common_config();
	

	
	
	if (isset($_GET)){
		foreach($_GET as $tempKey => $tempValue){
			if (!is_array($tempValue)){
				$_GET[$tempKey] = trim_x($tempValue);	
			}
		}
		
		$_GET['ID'] = intval($_GET['ID']);
		$_GET['id'] = intval($_GET['id']);
		
		if ($_GET['ID'] <= 0){
			$_GET['ID'] = $_GET['id'];	
		}
		$id = $ID = $_GET['ID'];
		unset($_GET['id']);
	}
	
	if (isset($_POST)){
		foreach($_POST as $tempKey => $tempValue){
			if (!is_array($tempValue)){
				$_POST[$tempKey] = trim_x($tempValue);	
			}
		}
	}
	
	if (true){
		$PAGE = array();
		$PAGE['Title'] = $BXAF_CONFIG['BXAF_PAGE_TITLE'];
	}
	
	if ($BXAF_CONFIG['API']){
		$_SESSION['User_Info']['First_Name'] 	= 'API';
		$_SESSION['User_Info']['Last_Name'] 	= 'User';
	}

	
	return true;
}







function load_common_config(){
	
	global $APP_CONFIG, $BXAF_CONFIG, $BXAF_CONFIG_DEFAULT;
	
	ini_set('memory_limit', -1);
	error_reporting(0);
	
	
	if (true){
		

		$BXAF_CONFIG_DEFAULT['CURL']['Bin']						= '/bin/curl';
		
		

		
		foreach($BXAF_CONFIG_DEFAULT as $tempKey => $tempValue){
			if (!isset($BXAF_CONFIG[$tempKey])){
				$BXAF_CONFIG[$tempKey] =  $tempValue;
			}
		}
	}
	
	
	
	if (true){
		$APP_CONFIG['TABLES']['AUDIT_TRAIL']		= 'Template_Audit_Trail';
		$APP_CONFIG['TABLES']['BOOKMARK']			= 'Template_Bookmark';
		$APP_CONFIG['TABLES']['COLUMN_INDEX']		= 'Template_Column_Index';
		$APP_CONFIG['TABLES']['COLUMN_INDEX_VALUE']	= 'Template_Column_Index_Value';
		$APP_CONFIG['TABLES']['EMAIL']				= 'Template_Email';
		$APP_CONFIG['TABLES']['INFO']				= 'Template_Info';
		$APP_CONFIG['TABLES']['MESSAGE']			= 'Template_Message';
		$APP_CONFIG['TABLES']['SETTINGS']			= 'Template_Settings';
		$APP_CONFIG['TABLES']['FILES']				= 'Template_Files';
		$APP_CONFIG['TABLES']['JOBS']				= 'Template_Jobs';
	}
	
	if (true){
		//1 day
		$APP_CONFIG['APP']['Cache_Expiration_Length'] 					= 86400;
		$APP_CONFIG['APP']['Cache_Expiration_Length_getSQL_Data'] 		= 86400;
		$APP_CONFIG['APP']['Cache_Expiration_Length_PostgreSQL_Data'] 	= 86400;
	}
	
	
	
	
	return true;
	
}




?>