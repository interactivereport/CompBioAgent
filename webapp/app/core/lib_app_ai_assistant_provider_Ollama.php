<?php


function preparePromptInput_Ollama($model = '', $prompt = '', $function_formatPrompt = '', $options = array()){
	
	$model = trim_x($model);
	$prompt = trim_x($prompt);
	
	if (($function_formatPrompt != '') && (function_exists($function_formatPrompt))){
		$prompt = $function_formatPrompt($prompt);
	}
	
	$json = array();
	$json['model'] 		= $model;
	$json['timeout'] 	= 300;
	$json['prompt']	 	= $prompt;
	$json['stream'] 				= false;
	$json['keep_alive'] 			= 300;
	$json['options']['temperature'] = 0;
	$json['options']['num_predict'] = 500;
    $json['options']['num_ctx'] 	= 40960;
    $json['options']['seed'] 		= 2;
	
	
	return json_encode($json);
}



function processPromptOutput_Ollama($response = NULL){
	
	if (is_string($response)){
		$response = json_decode($response, true);	
	}
	
	$responseRaw = $response['response'];
	if ($responseRaw == '') return false;
	
	
	$begin 	= strpos($responseRaw, '{');
	$end	= strrpos($responseRaw, '}');
	$strlen	= strlen($responseRaw);
	
	$JSON_String = substr($responseRaw, $begin, ($end - $begin + 1));
	
	
	
	$JSON_String = preg_replace('~
    (" (?:\\\\. | [^"])*+ ") | \# [^\v]*+ | // [^\v]*+ | /\* .*? \*/
  ~xs', '$1', $JSON_String);

 
	
	if ($JSON_String != ''){
		return json_decode($JSON_String, true);
	} else {
		return false;	
	}
	
	
	
}

?>