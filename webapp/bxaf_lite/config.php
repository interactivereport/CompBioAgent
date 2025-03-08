<?php

include_once(__DIR__ . "/config_session.php");



/***********************************************************
 * CUSTOMIZE THESE SETTINGS in /bxaf_setup/config.php *
 **********************************************************/



// Default Admin Login Password


$BXAF_CONFIG['HOST_DEFAULT_EMAIL']		= 'info@bioinforx.com';
$BXAF_CONFIG['HOST_DEFAULT_CONTACT']	= 'Contact';

//Optional settings
$BXAF_CONFIG['BXAF_PAGE_EMAIL']			= 'info@bioinforx.com';
$BXAF_CONFIG['BXAF_PAGE_APP_NAME'] 		= '';
$BXAF_CONFIG['BXAF_PAGE_APP_NAME_SHOW'] = true;

$BXAF_CONFIG['BXAF_PAGE_APP_LOGO_URL']		= '';
$BXAF_CONFIG['BXAF_PAGE_APP_ICON_CLASS']= 'fas fa-home';

$BXAF_CONFIG['BXAF_PAGE_TITLE'] 		= 'CompBioAgent';
$BXAF_CONFIG['BXAF_PAGE_DESCRIPTION'] 	= '';
$BXAF_CONFIG['BXAF_PAGE_KEYWORDS'] 		= '';
$BXAF_CONFIG['BXAF_PAGE_AUTHOR']					= 'Derrick Cheng (derrick@bioinforx.com)';

$BXAF_CONFIG['BXAF_PAGE_SPLIT']			= true;

$BXAF_CONFIG['BXAF_PAGE_HEADER'] 		= __DIR__ . "/page_header.php";
$BXAF_CONFIG['BXAF_PAGE_MENU']			= __DIR__ . "/page_menu.php";
$BXAF_CONFIG['BXAF_PAGE_LEFT']			= __DIR__ . "/page_left.php";
$BXAF_CONFIG['BXAF_PAGE_FOOTER']		= __DIR__ . "/page_footer.php";
$BXAF_CONFIG['BXAF_PAGE_FOOTER_CONTENT']= "<div class='text-black'>Powered by <a href='https://bioinforx.com/web/services_examples.php' target='_blank'>BioInfoRx</a>.</div>";


// Split Window Settings
$BXAF_CONFIG['BXAF_PAGE_CSS_WRAPPER']			= 'row no-gutters h-100';
$BXAF_CONFIG['BXAF_PAGE_CSS_LEFT']				= 'col-md-12 col-lg-3 col-xl-2 bg-faded p-3';
$BXAF_CONFIG['BXAF_PAGE_CSS_LEFT_FIXED_WIDTH']	= '';
$BXAF_CONFIG['BXAF_PAGE_CSS_RIGHT']				= 'col-md-12 col-lg-9 col-xl-10 d-flex align-content-between flex-wrap';
$BXAF_CONFIG['BXAF_PAGE_CSS_RIGHT_CONTENT']		= 'w-100 p-2';

$BXAF_CONFIG['BXAF_PAGE_LOGIN_NAME_WELCOME_MESSAGE']	= 'Sign in your account';
$BXAF_CONFIG['BXAF_PAGE_LOGIN_NAME_TITLE']				= 'Your Email or Login Name';
$BXAF_CONFIG['BXAF_PAGE_LOGIN_NAME_PLACEHOLDER']		= 'E-mail, e.g., name@example.com';
$BXAF_CONFIG['BXAF_PAGE_LOGIN_PASSWORD_PLACEHOLDER'] 	= 'Password is case sensitive.';


$BXAF_CONFIG['BXAF_PAGE_CSS_MENU'] 		= 'navbar-light bg-faded';
$BXAF_CONFIG['BXAF_PAGE_CSS_FOOTER']	= 'bxaf_page_footer table-info text-center text-muted py-3';

// Set which plugins should be loaded in /bxaf_lite/page_header.php
$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['jquery'] 		= true;
$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['bootstrap'] 	= true;
$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['font-awesome'] 	= true;
$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['tether'] 		= true;
$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['bootbox'] 		= true;
$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['jquery-md5']	= true;
$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['jquery-form']	= false;
$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['jquery-tabledit']= false;




//*****************************************************************************************
// DO NOT MAKE CHANGES BELOW *
//*****************************************************************************************


// Folder settings

$BXAF_CONFIG['BXAF_ROOT_DIR'] = realpath($_SERVER['DOCUMENT_ROOT']) . '/';

$BXAF_CONFIG['BXAF_DIR'] = dirname(dirname(realpath(__FILE__))) . '/';
$BXAF_CONFIG['BXAF_SETUP_DIR'] = $BXAF_CONFIG['BXAF_DIR'] . 'bxaf_setup/';

$BXAF_CONFIG['BXAF_SUBDIR'] = substr($BXAF_CONFIG['BXAF_DIR'], strlen($BXAF_CONFIG['BXAF_ROOT_DIR']));

$BXAF_CONFIG['BXAF_SYSTEM_DIR'] = dirname(realpath(__FILE__)) . '/';
$BXAF_CONFIG['BXAF_SYSTEM_SUBDIR'] = substr($BXAF_CONFIG['BXAF_SYSTEM_DIR'], strlen($BXAF_CONFIG['BXAF_ROOT_DIR']));

$BXAF_CONFIG['BXAF_APP_SUBDIR'] = $BXAF_CONFIG['BXAF_SUBDIR'] . "app/";
$BXAF_CONFIG['BXAF_WEB_SUBDIR'] = $BXAF_CONFIG['BXAF_APP_SUBDIR'];

$BXAF_CONFIG['BXAF_APP_DIR'] = $BXAF_CONFIG['BXAF_ROOT_DIR'] . $BXAF_CONFIG['BXAF_APP_SUBDIR'];
$BXAF_CONFIG['BXAF_WEB_DIR'] = $BXAF_CONFIG['BXAF_APP_DIR'];


$BXAF_CONFIG['BXAF_ROOT_URL'] = '';
if (($_SERVER['HTTPS'] == 'on') || 
	($_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')){
	$BXAF_CONFIG['BXAF_ROOT_URL'] .= 'https://';
} else {
	$BXAF_CONFIG['BXAF_ROOT_URL'] .= 'http://';
}

if ($_SERVER['HTTP_X_FORWARDED_HOST'] != ''){
	$BXAF_CONFIG['BXAF_ROOT_URL'] .= $_SERVER['HTTP_X_FORWARDED_HOST'];
} elseif ($_SERVER['HTTP_HOST'] != ''){
	$BXAF_CONFIG['BXAF_ROOT_URL'] .= $_SERVER['HTTP_HOST'];
}
$BXAF_CONFIG['BXAF_ROOT_URL'] .= '/';


$BXAF_CONFIG['BXAF_URL']		= $BXAF_CONFIG['BXAF_ROOT_URL'] . $BXAF_CONFIG['BXAF_SUBDIR'];
$BXAF_CONFIG['BXAF_SYSTEM_URL'] = $BXAF_CONFIG['BXAF_ROOT_URL'] . $BXAF_CONFIG['BXAF_SYSTEM_SUBDIR'];
$BXAF_CONFIG['BXAF_APP_URL'] 	= $BXAF_CONFIG['BXAF_ROOT_URL'] . $BXAF_CONFIG['BXAF_APP_SUBDIR'];
$BXAF_CONFIG['BXAF_WEB_URL'] 	= $BXAF_CONFIG['BXAF_APP_URL'];

$BXAF_CONFIG['BXAF_USER_PROFILE']		= $BXAF_CONFIG['BXAF_SYSTEM_URL'] . "user_profile.php";
$BXAF_CONFIG['BXAF_LOGIN_PAGE']			= $BXAF_CONFIG['BXAF_SYSTEM_URL'] . "login.php";
$BXAF_CONFIG['BXAF_LOGOUT_PAGE']		= $BXAF_CONFIG['BXAF_SYSTEM_URL'] . "login.php?action=logout";
$BXAF_CONFIG['BXAF_SIGNUP_PAGE']		= $BXAF_CONFIG['BXAF_SYSTEM_URL'] . "user_signup.php";
$BXAF_CONFIG['BXAF_USER_DEFAULT_PASSWORD']	= '';

$BXAF_CONFIG['BXAF_LOGIN_SUCCESS']  = $BXAF_CONFIG['BXAF_WEB_URL'];


$BXAF_CONFIG['EMAIL_POST_URL']  = $BXAF_CONFIG['BXAF_SYSTEM_URL'] . "bxaf_send_email.php";





//Database for user accounts: sqlite or mysql
$BXAF_CONFIG['BXAF_DB_DRIVER'] 		= 'sqlite';
//The full path to the SQLlite database file
$BXAF_CONFIG['BXAF_DB_NAME']	 	= $BXAF_CONFIG['BXAF_SETUP_DIR'] . "users.db";



$BXAF_CONFIG['BXAF_LOGIN_KEY'] = 'BXAF_USER_LOGIN_ID';
$BXAF_CONFIG['TBL_BXAF_LOGIN'] 	= 'tbl_bxaf_login';
$BXAF_CONFIG['TBL_BXAF_LOGIN_LOG'] 	= 'tbl_bxaf_login_log';





// Include Custom Settings Here
include_once(dirname(__DIR__) . "/bxaf_setup/config.php");



// Overwrite settings with custom values
if (is_array($BXAF_CONFIG_CUSTOM) && count($BXAF_CONFIG_CUSTOM) > 0){
	foreach($BXAF_CONFIG_CUSTOM as $key=>$val) $BXAF_CONFIG[$key] = $val;
}


if(isset($BXAF_CONFIG_CUSTOM['BXAF_APP_SUBDIR']) && $BXAF_CONFIG_CUSTOM['BXAF_APP_SUBDIR'] != ''){
	$BXAF_CONFIG['BXAF_WEB_SUBDIR'] = $BXAF_CONFIG['BXAF_APP_SUBDIR'];

	$BXAF_CONFIG['BXAF_APP_DIR'] = $BXAF_CONFIG['BXAF_ROOT_DIR'] . $BXAF_CONFIG['BXAF_APP_SUBDIR'];
	$BXAF_CONFIG['BXAF_WEB_DIR'] = $BXAF_CONFIG['BXAF_APP_DIR'];

	$BXAF_CONFIG['BXAF_APP_URL'] = $BXAF_CONFIG['BXAF_ROOT_URL'] . $BXAF_CONFIG['BXAF_APP_SUBDIR'];
	$BXAF_CONFIG['BXAF_WEB_URL'] = $BXAF_CONFIG['BXAF_APP_URL'];

	if(! isset($BXAF_CONFIG_CUSTOM['BXAF_LOGIN_SUCCESS'])) $BXAF_CONFIG['BXAF_LOGIN_SUCCESS']  = $BXAF_CONFIG['BXAF_WEB_URL'];
}





if (!function_exists('bxaf_get_app_db_connection')) {
	function bxaf_get_app_db_connection(){
		global $BXAF_CONFIG;

		if ($BXAF_CONFIG['APP_DB_DRIVER'] == 'sqlite'){

			try {
			    $conn = new SQLite3($BXAF_CONFIG['APP_DB_NAME']);
			} catch (Exception $e) {
			    die( $e->getMessage() );
			}

		} else if ($BXAF_CONFIG['APP_DB_DRIVER'] == 'mysql'){

			include_once(dirname(__FILE__) . "/bxaf_mysqli.min.php");

			$db_settings = array(
				'user'	=> $BXAF_CONFIG['APP_DB_USER'],
				'pass'	=> $BXAF_CONFIG['APP_DB_PASSWORD'],
				'db'	=> $BXAF_CONFIG['APP_DB_NAME'],
				'host'	=> $BXAF_CONFIG['APP_DB_SERVER'],
			);

			$conn = new bxaf_mysqli($db_settings);
			if (! $conn){
				echo "The system could not connect to the MySQL database.";
				exit();
			} else {
				$conn->Execute("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
				$conn->Execute("SET SESSION sql_mode = ''");
			}

		} else {
			die("Database driver is not correct.");
		}

		return $conn;
	}
}



?>