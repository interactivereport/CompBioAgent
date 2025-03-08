<?php


function preparePromptInput_Groq($model = '', $prompt = '', $function_formatPrompt = '', $options = array()){
	
	$model = trim_x($model);
	$prompt = trim_x($prompt);
	
	if (($function_formatPrompt != '') && (function_exists($function_formatPrompt))){
		$prompt = $function_formatPrompt($prompt);
	}
	

	
	$json = array();
	$json['model'] = $model;
	$json['messages'][0]['content'] = $prompt;
	$json['messages'][0]['role'] 	= 'user';
	$json['temperature'] = 0;
    $json['seed'] 		= 2;
	$json['stream'] = false;
	
	return json_encode($json);
}



function processPromptOutput_Groq($response = NULL){
	

	if (is_string($response)){
		$response = json_decode($response, true);	
	}
	
	$responseRaw = $response['choices'][0]['message']['content'];
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