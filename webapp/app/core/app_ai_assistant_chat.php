<?php
include_once('config_init.php');

$currentTable		= $APP_CONFIG['TABLES']['APP_AI_ASSISTANT_CHAT'];
$PAGE['Title'] 		= "{$BXAF_CONFIG['MESSAGE'][$currentTable]['General']['Brand']}, Single-Cell";
$PAGE['Header']		= $PAGE['Title'];
$PAGE['Category']	= "Settings";

$PAGE['URL']		= 'app_ai_assistant_chat.php';
$PAGE['Barcode']	= 'app_ai_assistant_chat.php';
$PAGE['Body'] 		= 'app_ai_assistant_chat_content.php';
$PAGE['EXE'] 		= '';
$PAGE['AJAX'] 		= 'app_ai_assistant_chat_ajax.php';
$PAGE['Header_no_hr'] = true;


$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['jquery3'] = true;

$query = $_GET['q'];



if ($query != ''){
	$query = str_replace(array('<', '>', '=', ':', "'", '"', ';'), '', $query);
	$query = htmlspecialchars($query);
}


include('template/php/components/page_generator.php');

?>
