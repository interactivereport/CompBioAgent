<?php

//Language File
//If you prefer a different language, feel free to make changes here.

$currentTable = 'App_AI_Assistant_Chat';

//Chat Title/Wording
if (true){
	
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['General']['Brand']
		= 'CompBioAgent';
}

//***************************
// Table Columns
//***************************
if (true){
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['Date']['Title'] 			
		= 'Date';
		
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['Date_Time']['Title'] 			
		= 'Date/Time';

	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['User_ID']['Title'] 				= 'User ID';
		
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['Model']['Title'] 					= 'AI Language Model';
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['Model']['Default'] 				= 'gpt-4o';
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['Model']['PlaceHolder']				= 'The model is used to translate your query into plot parameters';

	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['Cutoff']['Title'] 					= 'Expression Cutoff';
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['Cutoff']['PlaceHolder']			= '';
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['Cutoff']['Default'] 				= '0.1';
	

	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['img_width']['Title'] 				= 'Plot Width';
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['img_width']['PlaceHolder']			= 'Enter 0 to set the width automatically.';
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['img_width']['Default'] 			= '0';
	

	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['img_height']['Title'] 				= 'Plot Height';
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['img_height']['PlaceHolder']		= 'Enter 0 to set the height automatically.';
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['img_height']['Default'] 			= '0';

	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['titlefontsize']['Title'] 			= 'Title Font Size';
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['titlefontsize']['PlaceHolder']		= 'Enter 0 to set the width automatically.';
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['titlefontsize']['Default'] 		= '0';

	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['dotsize']['Title'] 				= 'Dot Size';
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['dotsize']['PlaceHolder']			= 'Enter 0 to set the width automatically.';
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['dotsize']['Default'] 				= '0';

	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['Color']['Title'] 					= 'Color Palette';
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['Color']['Value']['Set1'] 			= 'Set 1';
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['Color']['Value']['Set2'] 			= 'Set 2';
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['Color']['Value']['Set3'] 			= 'Set 3';
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['Color']['Value']['bright'] 		= 'Bright';
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['Color']['Value']['tab20'] 			= 'Tab 20';
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['Column']['Color']['Default'] 				= 'Set3';
	

}



?>