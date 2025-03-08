<?php

$BXAF_CONFIG_CUSTOM['BXAF_PAGE_HEADER_LIBRARIES']['bootstrap5'] 	= true;
$BXAF_CONFIG_CUSTOM['BXAF_PAGE_HEADER_LIBRARIES']['bootstrap'] 		= false;

include_once(dirname(dirname(__FILE__)) . "/config.php");


include_once('./template/php/libs/lib_general_common.php');
include_once('./template/php/libs/lib_general_db_MySQL.php');



if (array_size($BXAF_CONFIG['SETTINGS']['LLM']) <= 0){
	echo printMsg('The LLM setting is missing. Please refer to the bxaf_setup/default/3-Large_Language_Model.php for details.');
	exit();
}

if (array_size($BXAF_CONFIG['SETTINGS']['data']['By-Disease']) <= 0){
	echo printMsg('The disease setting is missing. Please refer to the bxaf_setup/default/4-Disease_Database.php for details.');
	exit();
} else {
	ksort($BXAF_CONFIG['SETTINGS']['data']['By-Disease']);
	
	$BXAF_CONFIG['SETTINGS']['data']['by-disease'] = array();
	foreach($BXAF_CONFIG['SETTINGS']['data']['By-Disease'] as $currentDiseaseKey => $currentDiseaseInfo){
		$currentDiseaseKey = trim_x(strtolower_x($currentDiseaseKey));
		
		$BXAF_CONFIG['SETTINGS']['data']['by-disease'][$currentDiseaseKey] = $currentDiseaseInfo;

		if (array_size($currentDiseaseInfo['Alias']) > 0){
			foreach($currentDiseaseInfo['Alias'] as $tempKeyX => $currentDiseaseAlias){
				$currentDiseaseAlias = trim_x(strtolower_x($currentDiseaseAlias));	
				if ($currentDiseaseAlias != ''){
					$BXAF_CONFIG['SETTINGS']['data']['by-disease'][$currentDiseaseAlias] = $currentDiseaseInfo;
				}
			}
		} elseif (is_string($currentDiseaseInfo['Alias'])){
			$currentDiseaseAlias = trim_x(strtolower_x($currentDiseaseAlias));	
			if ($currentDiseaseAlias != ''){
				$BXAF_CONFIG['SETTINGS']['data']['by-disease'][$currentDiseaseAlias] = $currentDiseaseInfo;
			}
		}
	}
}




$BXAF_CONFIG['MESSAGE'][$currentTable]['Column']['Model']['Value'] = array();
foreach($BXAF_CONFIG['SETTINGS']['LLM'] as $modelKey => $modelValue){
	$BXAF_CONFIG['MESSAGE'][$currentTable]['Column']['Model']['Value'][$modelKey] = $modelValue['Title'];
}


include_once('config_app.php');
include_once('config_app_ai_assistant.php');
include_once('config_menu.php');
include_once('config_version.php');


include_once('lib_app_ai_assistant_cache.php');
include_once('lib_app_ai_assistant_chat.php');

include_once('lib_app_ai_assistant_provider_Ollama.php');
include_once('lib_app_ai_assistant_provider_OpenAI.php');
include_once('lib_app_ai_assistant_provider_Groq.php');


initialize_default_settings();



?>