<?php


function get_ai_assistant_chat_v2_nat2json_step1($prompt = NULL, $options = NULL){
	
	global $BXAF_CONFIG;

	$prompt = trim_x($prompt);
	$prompt = str_replace('`', "'", $prompt);
	if ($prompt == '') return false;
	
	if (!endsWith($prompt, '.')){
		$prompt .= '.';	
	}

	
	$model = trim_x($options['Model']);
	if ($model == '') return false;
	
	$curl = $BXAF_CONFIG['CURL']['Bin'];
	if ($curl == '') return false;
	
	
	$URL = $BXAF_CONFIG['SETTINGS']['LLM'][$model]['API_URL'];
	if ($URL == '') return false;
	
	$function_preparePromptInput = $BXAF_CONFIG['SETTINGS']['LLM'][$model]['preparePromptInput'];
	if (($function_preparePromptInput == '') || (function_exists($function_preparePromptInput) == false)) return false;
	
	
	$function_formatPrompt = $BXAF_CONFIG['SETTINGS']['LLM'][$model]['formatPrompt'];
	if (($function_formatPrompt == '') || (function_exists($function_formatPrompt) == false)) return false;

	$json_input = $function_preparePromptInput($model, $prompt, $function_formatPrompt, $options);
	if ($json_input == '') return false;
	
	$cmd_results	= trim_x(get_ai_assistant_command_from_database(1, $json_input));
	
	if ($cmd_results == ''){
		
		
		$dir = "{$BXAF_CONFIG['WORK_DIR']}/Curl/";
		
		if ($dir == '') return false;
		
		$dir = "{$dir}/" . date('Y') . '/' . date('m') . '/' . date('d') . '/';
		mkdir($dir, 0777, true);
		$filename = tempnam($dir, "Curl");

		
		$fp = fopen($filename, "w");
		fwrite($fp, $json_input);
		fclose($fp);
		
		chmod($filename, 0555);
		
		$headers = array();
		foreach($BXAF_CONFIG['SETTINGS']['LLM'][$model]['Headers'] as $tempKey => $currentHeader){
			$headers[] = "-H \"{$currentHeader}\"";
		}
		$headers = implode(' ', $headers);
		
		$cmd = "{$curl} -s -k -X POST {$headers} -d @{$filename} '{$URL}'";

		$time_start 	= microtime(true);
		$cmd_results 	= trim_x(shell_exec($cmd));
		$duration		= microtime(true) - $time_start;
		$source			= 'executed';

		if ($cmd_results != ''){
			
			$cmd_results_json = NULL;
			
			$function_processOutput = $BXAF_CONFIG['SETTINGS']['LLM'][$model]['processOutput'];
			if (($function_processOutput != '') && (function_exists($function_processOutput))){
				$cmd_results_json = $function_processOutput($cmd_results);
				
				
				if (!empty($cmd_results_json)){
					save_ai_assistant_command_to_database(1, $json_input, $cmd_results);
				}
				
			}
			
			
			
			
		}

		
	} else {
		$source			= 'cache';
	}
	
	
	$results = array();
	$results['query']					= $query;
	$results['query_parameters']		= $json;
	$results['cmd'] 					= $cmd;
	$results['results_raw']				= $cmd_results;
	$results['duration'] 				= $duration;
	$results['source'] 					= $source;
	
	if ($results['results_raw'] != ''){
		$results['results'] = json_decode($results['results_raw'], true);
	}
	
	
	return $results;
	
}


function get_ai_assistant_chat_v2_nat2json_step2($model = '', $inputArray = NULL){
	
	global $BXAF_CONFIG;

	
	$function_processOutput = $BXAF_CONFIG['SETTINGS']['LLM'][$model]['processOutput'];
	if (($function_processOutput == '') || (function_exists($function_processOutput) == false)) return false;
	
	
	$results = $function_processOutput($inputArray['results']);
	
	return $results;
	
	
}

function get_ai_assistant_chat_v2_nat2json_step3($inputArray = NULL, $options = NULL){
	
	global $BXAF_CONFIG;

	$results = array();
	
	$diseases = $inputArray['Answers']['query']['disease'];
	if (is_string($diseases)){
		
		if (($diseases == 'none') || ($diseases == '')){
			$diseases = array();
			
			$results['Error'] = "There is no disease available. Please revise your question by including disease.";
			$results['diseases'] = $diseases;
			
			return $results;
			
		} else {
			$diseases = $inputArray['Answers']['query']['disease'] = array($diseases);
			$results['diseases'] = $diseases;
		}
	} else {
		$results['diseases'] = $diseases;	
	}

	$foundDisease 		= false;
	$selectedDisease 	= '';
	foreach($diseases as $tempKey => $currentDisease){
		
		$currentDiseaseLowerCase = trim_x(strtolower($currentDisease));
		
		if (isset($BXAF_CONFIG['SETTINGS']['data']['by-disease'][$currentDiseaseLowerCase])){
			$foundDisease = true;
			$selectedDisease = $currentDisease;
			$selectedDiseaseLowerCase = $currentDiseaseLowerCase;
		}
	}

	if (!$foundDisease){
		$results['Error'] 	= "There is no data associated with the disease: {$diseases[0]}";
		return $results;
	} else {
		$results['search_results']['disease_info'] 	= $BXAF_CONFIG['SETTINGS']['data']['by-disease'][$selectedDiseaseLowerCase];
		$results['search_results']['disease'] 		= $selectedDisease;
	}


	if (true){
		$filePath_h5ad1 		= $BXAF_CONFIG['SETTINGS']['data']['by-disease'][$selectedDiseaseLowerCase]['File_Raw'];
		$filePath_h5ad1_slim 	= $BXAF_CONFIG['SETTINGS']['data']['by-disease'][$selectedDiseaseLowerCase]['File_Slim'];
		$filePath_h5ad2_slim 	= str_replace('.h5ad', '_slim.h5ad', $filePath_h5ad1);


		if (is_file($filePath_h5ad1_slim)){
			$results['json']['h5ad'] = $filePath_h5ad1_slim;
		} elseif (is_file($filePath_h5ad2_slim)){
			$results['json']['h5ad'] = $filePath_h5ad2_slim;
		} elseif (is_file($filePath_h5ad1)){
			$results['json']['h5ad'] = $filePath_h5ad1;
		} else {
			$results['Error'] 	= "The h5ad files are not available:<ul><li>{$filePath_h5ad1}</li><li>{$filePath_h5ad1_slim}</li><li>{$filePath_h5ad2_slim}</li></ul>Please contact the system administrator for details:";
			return $results;
		}
	}

	$options['img_width'] 		= abs(intval($options['img_width']));
	$options['img_height'] 		= abs(intval($options['img_height']));
	$options['dotsize'] 		= abs(intval($options['dotsize']));
	$options['titlefontsize'] 	= abs(intval($options['titlefontsize']));


	$options['yscale']	= $inputArray['Answers']['Action for query results']['scRNA-Seq']['plot options']['layout'];

	$results['json']['var_col'] = '';

	//Plot Type
	if (true){
		$plotType = $inputArray['Answers']['Action for query results']['scRNA-Seq']['plot'];
		$plotType = trim_x(strtolower($plotType));

		if ($plotType == 'violin plot'){
			$results['json']['plot'] = 'violin';
			$results['json']['reductions'] = array();
			
			if ($options['img_width'] == 0){
				$options['img_width'] = 15;
			}

			if ($options['img_height'] == 0){
				$options['img_height'] = 4;
			}
		}

		if ($plotType == 'embedding plot'){
			$results['json']['plot'] = 'embedding';
			$results['json']['reductions'] = array();

			if ($options['dotsize'] == 0){
				$options['dotsize'] = 2;
			}

			if ($inputArray['Answers']['Action for query results']['scRNA-Seq']['plot options']['embedding layout'] != ''){
				$results['json']['reductions'] = array("X_" . $inputArray['Answers']['Action for query results']['scRNA-Seq']['plot options']['embedding layout']);
			}

		}

		if ($plotType == 'stacked barplot'){
			$results['json']['plot'] = 'stackbar';
			$results['json']['reductions'] = array();
			$results['json']['options']['color_map'] = 'viridis';

			if ($options['dotsize'] == 0){
				$options['dotsize'] = 2;
			}

			if ($options['img_width'] == 0){
				$options['img_width'] = 7;
			}

			if ($options['img_height'] == 0){
				$options['img_height'] = 7;
			}
		}

		if ($plotType == 'dot plot'){
			$results['json']['plot'] = 'dotplot';
			$results['json']['reductions'] = array();
			$results['json']['options']['color_map'] = 'Reds';
			if ($options['dotsize'] == 0){
				$options['dotsize'] = 2;
			}

			if ($options['img_width'] == 0){
				$options['img_width'] = 6;
			}

			if ($options['img_height'] == 0){
				$options['img_height'] = 6;
			}
		}

		if ($plotType == 'heatmap'){
			$results['json']['plot'] = 'heatmap';
			$results['json']['reductions'] = array();
			$results['json']['options']['color_map'] = 'viridis';
			$results['json']['options']['cell_order'] = 'groups';
			$results['json']['options']['heat_scale'] = 'expression';
			$results['json']['options']['yscale'] = 'proportion';


			if ($options['dotsize'] == 0){
				$options['dotsize'] = 2;
			}

			if ($options['img_width'] == 0){
				$options['img_width'] = 6;
			}

			if ($options['img_height'] == 0){
				$options['img_height'] = 7;
			}
		}
	}

	//Genes
	if (true){
		$genes = $inputArray['Answers']['Action for query results']['scRNA-Seq']['plot options']['gene'];
		if (is_array($genes)){
			$results['json']['genes'] = $genes;
		} else {
			$results['json']['genes'] = array(trim_x($genes));
		}
	}


	//Group By, Sub Group By
	if (true){

		$columnsToCheck = array('group by', 'sub-group by', 'annotation', 'split by');
		foreach($columnsToCheck as $tempKey => $currentColumn){
			$candidate = $inputArray['Answers']['Action for query results']['scRNA-Seq']['plot options'][$currentColumn];
			if (is_array($candidate)){
				foreach($candidate as $tempKey => $currentCandidate){
					$column = $BXAF_CONFIG['SETTINGS']['data']['by-disease'][$selectedDiseaseLowerCase]['Project_Column_Mapping'][$currentCandidate];
					if ($column != ''){
						$results['json']['groups'][$column] = array();
					}
				}
			} else {
				$column = $BXAF_CONFIG['SETTINGS']['data']['by-disease'][$selectedDiseaseLowerCase]['Project_Column_Mapping'][$candidate];
				if ($column != ''){
					$results['json']['groups'][$column] = array();
				}
			}
		}
	}

	//Other parameters
	if (true){
		$results['json']['options']['cutoff'] 			= abs(floatval($options['Cutoff']));
		$results['json']['options']['palette'] 			= $options['Color'];
		$results['json']['options']['dotsize'] 			= $options['dotsize'];
		$results['json']['options']['img_width'] 		= $options['img_width'];
		$results['json']['options']['img_height'] 		= $options['img_height'];
		$results['json']['options']['img_id'] 			= '';
		$results['json']['options']['img_format']		= 'png';
		$results['json']['options']['img_html'] 		= false;
		$results['json']['options']['yscale'] 			= $options['yscale'];
		$results['json']['options']['titlefontsize'] 	= $options['titlefontsize'];
		$results['json']['options']['dotcolor']			= '#008';
	}

	
	
	return $results;

	
	
}


function get_ai_assistant_chat_v2_nat2json_step4($json = array(), $debug = false){

	global $BXAF_CONFIG;
	
	$json_input			= json_encode($json);

	$cmd_results	= trim_x(get_ai_assistant_command_from_database(2, $json_input));
	
	
	if ($cmd_results == ''){

		if (true){
		
			$dir = "{$BXAF_CONFIG['WORK_DIR']}/ploth5ad/";
			
			if ($dir == '') return false;
			
			$dir = "{$dir}/" . date('Y') . '/' . date('m') . '/' . date('d') . '/';
			mkdir($dir, 0777, true);
			$filename = tempnam($dir, "Curl");

			
			$fp = fopen($filename, "w");
			fwrite($fp, $json_input);
			fclose($fp);
			
			chmod($filename, 0555);
			
			$cmd = "{$BXAF_CONFIG['CELLXGENE_plotH5ad2']} {$filename}";
			
			if ($debug){
				echo printMsg($cmd);	
			}
		}


		$time_start 	= microtime(true);
		$cmd_results 	= trim_x(shell_exec($cmd));
		$duration		= microtime(true) - $time_start;
		$source			= 'executed';
		
		
		

		if ($cmd_results != ''){
			save_ai_assistant_command_to_database(2, $json_input, $cmd_results);
		}

		
	} else {
		$source			= 'cache';
	}

	
	$results = array();
	$results['query_parameters']		= $json;
	$results['cmd'] 					= $cmd;
	$results['results_raw']				= $cmd_results;
	$results['duration'] 				= $duration;
	$results['source'] 					= $source;
	
	
	return $results;

	
	
}




?>