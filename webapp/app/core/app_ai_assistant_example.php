<?php
include_once('config_init.php');

$currentTable		= $APP_CONFIG['TABLES']['APP_AI_ASSISTANT_CHAT'];
$PAGE['Title'] 		= $BXAF_CONFIG['MESSAGE'][$currentTable]['General']['Examples'];
$PAGE['Header']		= $PAGE['Title'];
$PAGE['Category']	= "Settings";

$PAGE['URL']		= 'app_ai_assistant_example.php';
$PAGE['Barcode']	= 'app_ai_assistant_example.php';
$PAGE['Body'] 		= 'app_ai_assistant_example_content.php';
$PAGE['EXE'] 		= '';
$PAGE['AJAX'] 		= '';
$PAGE['Header_no_hr'] = true;

$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['jquery3'] = true;



include('template/php/components/page_generator.php');

?>
