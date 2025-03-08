<?php
include_once('config_init.php');

$PAGE['Title'] 		= "{$BXAF_CONFIG['MESSAGE'][($APP_CONFIG['TABLES']['APP_AI_ASSISTANT_CHAT'])]['General']['Brand']}, Single-Cell";
$PAGE['Header']		= $PAGE['Title'];
$PAGE['Category']	= "Settings";

$PAGE['URL']		= 'app_ai_assistant_chat.php';
$PAGE['Barcode']	= 'app_ai_assistant_chat.php';
$PAGE['Body'] 		= 'app_ai_assistant_chat_content.php';
$PAGE['EXE'] 		= '';
$PAGE['AJAX'] 		= 'app_ai_assistant_chat_ajax.php';
$PAGE['Header_no_hr'] = true;

$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['jquery3'] = true;

include('template/php/components/page_generator.php');

?>
