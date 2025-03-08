<?php

//Project
if (true){
	$currentTable = $APP_CONFIG['TABLES']['APP_AI_ASSISTANT_CHAT'];

	
	foreach (array('Model', 'Color') as $tempKey => $currentColumn){
		$APP_CONFIG['DICTIONARY'][$currentTable][$currentColumn]['Title'] 					= $BXAF_CONFIG['MESSAGE'][$currentTable]['Column'][$currentColumn]['Title'];
		$APP_CONFIG['DICTIONARY'][$currentTable][$currentColumn]['printForm']['New']		= 'printDropDown_Config_KeyValue';
		$APP_CONFIG['DICTIONARY'][$currentTable][$currentColumn]['Value']					= $BXAF_CONFIG['MESSAGE'][$currentTable]['Column'][$currentColumn]['Value'];
		$APP_CONFIG['DICTIONARY'][$currentTable][$currentColumn]['PlaceHolder'] 			= $BXAF_CONFIG['MESSAGE'][$currentTable]['Column'][$currentColumn]['PlaceHolder'];
		$APP_CONFIG['DICTIONARY'][$currentTable][$currentColumn]['Label_Class']				= 'col-12';
		$APP_CONFIG['DICTIONARY'][$currentTable][$currentColumn]['Value_Class']				= 'col-12';
		$APP_CONFIG['DICTIONARY'][$currentTable][$currentColumn]['Search']					= true;
		$APP_CONFIG['DICTIONARY'][$currentTable][$currentColumn]['Browse']					= true;
		$APP_CONFIG['DICTIONARY'][$currentTable][$currentColumn]['Type']					= 'array_key_value';
		$APP_CONFIG['DICTIONARY'][$currentTable][$currentColumn]['Default']					= $BXAF_CONFIG['MESSAGE'][$currentTable]['Column'][$currentColumn]['Default'];
	}
	
	
	
	foreach (array('Cutoff', 'img_height', 'img_width', 'dotsize', 'titlefontsize') as $tempKey => $currentColumn){
		$APP_CONFIG['DICTIONARY'][$currentTable][$currentColumn]['Title'] 					= $BXAF_CONFIG['MESSAGE'][$currentTable]['Column'][$currentColumn]['Title'];
		$APP_CONFIG['DICTIONARY'][$currentTable][$currentColumn]['printForm']['New']		= 'printInput';
		$APP_CONFIG['DICTIONARY'][$currentTable][$currentColumn]['Value']					= $BXAF_CONFIG['MESSAGE'][$currentTable]['Column'][$currentColumn]['Value'];
		$APP_CONFIG['DICTIONARY'][$currentTable][$currentColumn]['PlaceHolder'] 			= $BXAF_CONFIG['MESSAGE'][$currentTable]['Column'][$currentColumn]['PlaceHolder'];
		$APP_CONFIG['DICTIONARY'][$currentTable][$currentColumn]['Label_Class']				= 'col-12';
		$APP_CONFIG['DICTIONARY'][$currentTable][$currentColumn]['Value_Class']				= 'col-12';
		$APP_CONFIG['DICTIONARY'][$currentTable][$currentColumn]['Search']					= true;
		$APP_CONFIG['DICTIONARY'][$currentTable][$currentColumn]['Browse']					= true;
		$APP_CONFIG['DICTIONARY'][$currentTable][$currentColumn]['Type']					= 'number';
		$APP_CONFIG['DICTIONARY'][$currentTable][$currentColumn]['Default']					= $BXAF_CONFIG['MESSAGE'][$currentTable]['Column'][$currentColumn]['Default'];
	}
	
	

}

?>