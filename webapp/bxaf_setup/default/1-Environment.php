<?php

//Timezone
//See here for the complete list: https://www.php.net/manual/en/timezones.php
date_default_timezone_set('America/Chicago');

//MySQL/MariaDB settings
$BXAF_CONFIG_CUSTOM['APP_DB_DRIVER']               	 	= 'mysql';
$BXAF_CONFIG_CUSTOM['APP_DB_SERVER'] 					= 'localhost';
$BXAF_CONFIG_CUSTOM['APP_DB_USER'] 						= 'MYSQL_USER_ID';
$BXAF_CONFIG_CUSTOM['APP_DB_PASSWORD'] 					= 'MYSQL_USER_PASSWORD';
$BXAF_CONFIG_CUSTOM['APP_DB_NAME'] 				   		= 'db_compbioagent';


$BXAF_APP_SUBDIR                                        = "compbioagent/app/";
$BXAF_CUSTOMER_SUBDIR                                   = "compbioagent/bxaf_setup/images/";
$BXAF_CONFIG_CUSTOM['BXAF_PAGE_HEADER_CUSTOM_CSS']		= "/{$BXAF_APP_SUBDIR}css/page.css";
$BXAF_CONFIG_CUSTOM['BXAF_PAGE_HEADER_CUSTOM_JS']		= "/{$BXAF_APP_SUBDIR}js/page.js";
$BXAF_CONFIG_CUSTOM['BXAF_PAGE_APP_LOGO_URL'] 			= "/{$BXAF_CUSTOMER_SUBDIR}compbioAgent.png";
$BXAF_CONFIG_CUSTOM['BXAF_PAGE_APP_URL_ICON']			= "/{$BXAF_CUSTOMER_SUBDIR}compbioAgent.png";
$BXAF_CONFIG_CUSTOM['BXAF_LOGIN_SUCCESS'] 				= "/{$BXAF_APP_SUBDIR}core/index.php";


$BXAF_CONFIG_CUSTOM['WORK_DIR']							= '/var/www/html/compbioagent_share/';

//Cellxgene Location
$BXAF_CONFIG_CUSTOM['CELLXGENE_plotH5ad2']				= '/cellxgene_VIP/bin/plotH5ad.sh';

//Curl Location
$BXAF_CONFIG_CUSTOM['CURL']['Bin']						= '/bin/curl';



?>