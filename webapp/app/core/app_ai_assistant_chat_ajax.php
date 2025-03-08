<?php

include('config_init.php');

$query = trim_x($_POST['query']);
$debug = 0;

if ($query == ''){
	$message = "<p>" . printFontAwesomeIcon('fas fa-exclamation-triangle text-danger') . " Error. Please enter something and try again.</p>";
	echo getAlerts($message, 'danger');
	exit();
}



$nat2json = get_ai_assistant_chat_v2_nat2json_step1($query, $_POST);
if ($debug){
	echo printMsg("Natural Language Processing:");
	echo printrExpress($nat2json['results']);
}

$formattedResults = get_ai_assistant_chat_v2_nat2json_step2($_POST['Model'], $nat2json);
if ($debug){
	echo printMsg("Formated Results");
	echo printrExpress($formattedResults);
}

$h5ad_input = get_ai_assistant_chat_v2_nat2json_step3($formattedResults, $_POST);
if ($debug){
	echo printMsg("Plot Command:");
	echo printrExpress($h5ad_input);
}


if ($h5ad_input['Error'] != ''){
	$message = "<p>" . printFontAwesomeIcon('fas fa-exclamation-triangle text-danger') . " {$h5ad_input['Error']}</p>";
	echo getAlerts($message, 'danger');
	exit();
}


$h5ad_image_results = get_ai_assistant_chat_v2_nat2json_step4($h5ad_input['json'], $debug);


if ($h5ad_image_results['results_raw'] == ''){
	$message = "<p>" . printFontAwesomeIcon('fas fa-exclamation-triangle text-danger') . " Error. The plot is not available.</p>";
	echo getAlerts($message, 'danger');
	exit();
	
} else {
	echo "<div class='text-center'>";
		echo "<img class='img-fluid img-thumbnail rounded' src='{$h5ad_image_results['results_raw']}'/>";
	echo "</div>";
}



echo "<div class='py-3'>";
	
	$actions = array();
	
	if ($h5ad_input['search_results']['disease'] != ''){
		$actions[] = "Query Disease: {$h5ad_input['search_results']['disease']}";
	}
	
	$URL = $h5ad_input['search_results']['disease_info']['URL_About'];
	if ($URL != ''){
		$actions[] =  "<a href='{$URL}' target='_blank'>" . 
					printFontAwesomeIcon('fas fa-external-link-alt') . "&nbsp;View Data Details</a>";	
	}
	
	$URL = $h5ad_input['search_results']['disease_info']['URL_CellxgeneVIP'];
	if ($URL != ''){
		$actions[] =  "<a href='{$URL}' target='_blank'>" . 
					printFontAwesomeIcon('fas fa-braille') . "&nbsp;Cellxgene VIP</a>";	
	}
	
	if (array_size($actions) > 0){
		echo "<div>" . implode("<br/>", $actions) . "</div>";
	}
	
	
echo "</div>";








?>