<?php

class HTML_Form{
	
	private $currentSQL, $currentTable, $currentValue, $currentTitle, 
			$currentDropDownValue,
			$currentPlaceHolder, $currentPlaceHolderReadOnly, 
			$currentRequired, $currentFunction, $printHidden, $currentRows,
			$currentLabelClass, $currentValueClass, $currentValueByClass, $currentValuesDictionary, $currentValueFunction,
			$currentOptions,
			$componentOnly, $useSQLCache, $currentComponentClass, $isVirtual;

	
	
	public function __construct($options = array()){
		
		global $APP_CONFIG;
		
		
		if (array_size($options['HTML_Attributes']) > 0){
			
			$options['HTML_Attributes_String'] = array();
			
			foreach($options['HTML_Attributes'] as $tempKey => $tempValue){
				$options['HTML_Attributes_String'][] = "{$tempKey}='{$tempValue}'";
			}
			
			$options['HTML_Attributes_String'] = implode_x(' ', $options['HTML_Attributes_String']);
		} else {
			$options['HTML_Attributes_String'] = '';
		}
		
	
	
		$this->currentOptions			= $options;
		
		if (true){
			$currentSQL 				= $options['Column'];
			$this->currentSQL 			= $currentSQL;
		}
		
		if (true){
			$currentTable				= $options['Table'];
			$this->currentTable 		= $currentTable;
		}

		
		

		if (true){
			$currentValue			= $options['Value'];
			$this->currentValue 	= $currentValue;
		}
		
		
		if (true){
			$currentValueFunction		= $options['ValueFunction'];
			
			if ($currentValueFunction == ''){
				$currentValueFunction	= $options['Value_Function'];
			}
			
			if ($currentValueFunction == ''){
				$currentValueFunction	= $APP_CONFIG['DICTIONARY'][$currentTable][$currentSQL]['Value_Function'];
			}
			
			if (($currentValueFunction != '') && function_exists_x($currentValueFunction)){
				$this->currentValueFunction	= $currentValueFunction;
			}
			
			
		}
		
		
		if (true){
			$currentPlaceHolder		= $options['PlaceHolder'];
			if ($currentPlaceHolder == ''){
				$currentPlaceHolder	= $APP_CONFIG['DICTIONARY'][$currentTable][$currentSQL]['PlaceHolder'];
			}
			$this->currentPlaceHolder	= $currentPlaceHolder;
		}
		
		if (true){
			$currentPlaceHolderReadOnly		= $options['PlaceHolderReadOnly'];
			if ($currentPlaceHolderReadOnly == ''){
				$currentPlaceHolderReadOnly	= $APP_CONFIG['DICTIONARY'][$currentTable][$currentSQL]['PlaceHolderReadOnly'];
			}
			$this->currentPlaceHolderReadOnly	= $currentPlaceHolderReadOnly;
		}
		
		
		if (true){
			$currentRows			= intval($options['Rows']);

			if ($options['Rows'] == 0){
				$currentRows		= $APP_CONFIG['DICTIONARY'][$currentTable][$currentSQL]['Rows'];		
			}
			
			
			if ($currentRows <= 0){
				$currentRows		= 8;	
			}
			$this->currentRows		= $currentRows;
			
		}
		
		
		
		if (true){
			
			$currentTitle				= $options['Title'];
			if ($currentTitle == ''){
				$currentTitle			= $APP_CONFIG['DICTIONARY'][$currentTable][$currentSQL]['Title'];
			}
			
			if ($currentTitle == ''){
				$currentTitle			= getHeaderDisplayName($currentTable, $currentSQL, 0);
			}
			
			$currentTitleRaw			= $currentTitle;
			$currentRequired			= '';

			if (isset($options['Required'])){
				if ($options['Required']){
					$currentRequired		= '*';
				}
			} elseif (isset($APP_CONFIG['DICTIONARY'][$currentTable][$currentSQL]['Required'])){
				if ($APP_CONFIG['DICTIONARY'][$currentTable][$currentSQL]['Required']){
					$currentRequired		= '*';
				}
			}
			
			if (trim_x($currentTitle) == ''){
				$currentTitle 			= '';	
				$currentRequired		= '';
			} elseif (!endsWith($currentTitle, '?') && !endsWith($currentTitle, '>') && !endsWith($currentTitle, '<') && !endsWith($currentTitle, '=')){
				$currentTitle			= trim_x("{$currentTitle} {$currentRequired}") . ':';
			} else {
				$currentTitle			= trim_x("{$currentTitle} {$currentRequired}");
			}
			
			$this->currentTitle 		= $currentTitle;
			$this->currentRequired		= $currentRequired;
		}
		
		
		if (true){
			$currentFunction		= $options['Function'];
			
			if ($currentFunction == ''){
				$currentFunction	= $APP_CONFIG['DICTIONARY'][$currentTable][$currentSQL]['printForm']['New'];
			}
			
			
			
			if ($currentFunction == ''){
				$currentFunction	= 'printInput';
			}
			
			
			
			
			
			$this->currentFunction	= $currentFunction;
		}
		
		
		
		
		if (true){
			$currentLabelClass		= $options['Label_Class'];
			
			if ($currentLabelClass == ''){
				$currentLabelClass 	= $APP_CONFIG['DICTIONARY'][$currentTable][$currentSQL]['Label_Class'];
			}
			
			if ($currentLabelClass == ''){
				$currentLabelClass 	= 'col-2';
			}
			$this->currentLabelClass	= $currentLabelClass;
		}
		
		
		if (true){
			$currentValueClass		= $options['Value_Class'];
			if ($currentValueClass == ''){
				$currentValueClass 	= $APP_CONFIG['DICTIONARY'][$currentTable][$currentSQL]['Value_Class'];
			}
			
			if ($currentValueClass == ''){
				$currentValueClass 	= 'col-8';
			}
			$this->currentValueClass	= $currentValueClass;
		}
		
		if (true){
			$currentValueByClass	= $options['Value_By_Class'];
			if (array_size($currentValueByClass) <= 0){
				$currentValueByClass 	= $APP_CONFIG['DICTIONARY'][$currentTable][$currentSQL]['Value_By_Class'];	
			}
			
			
			
			$this->currentValueByClass	= $currentValueByClass;
			
			
			$currentValuesDictionary = $this->currentValuesDictionary;
			
			
			if (array_size($currentValueByClass) > 0){
				
				
				foreach($currentValueByClass as $tempKey1 => $tempValue1){
					
					foreach($tempValue1 as $tempKey2 => $tempValue2){
						$currentValuesDictionary[$tempValue2]['Class'][] = $tempKey1;
					}
				}
				
				
				
				$this->currentValuesDictionary = $currentValuesDictionary;
			}
			
			
		}
		
		
		
		if (true){
			$componentOnly 			= $options['Component_Only'];
			$this->componentOnly	= $componentOnly;
		}
		
		
		if (true){
			$currentDropDownValue	= $options['Drop_Down_Value'];
			
			if (array_size($currentDropDownValue) <= 0){
				$currentDropDownValue = $APP_CONFIG['DICTIONARY'][$currentTable][$currentSQL]['Value'];
			}
			$this->currentDropDownValue	= $currentDropDownValue;
		}
		
		
		
	
		if (true){
			
			$currentComponentClass = '';
			
			if (isset($options['Component_Class'])){
				$currentComponentClass			= $options['Component_Class'];
			} elseif (isset($APP_CONFIG['DICTIONARY'][$currentTable][$currentSQL]['Component_Class'])){
				$currentComponentClass			= $APP_CONFIG['DICTIONARY'][$currentTable][$currentSQL]['Component_Class'];
			}
			
			
			
			$this->currentComponentClass	= $currentComponentClass;
		}
  	}
	
	public function printHTMLForm(){
		$currentFunction 	= $this->currentFunction;
		$currentOptions		= $this->currentOptions;
		
		$results = '';
		
		
		
		if ($currentFunction == 'printInput'){
			$results = $this->printInput();	
		} elseif ($currentFunction == 'printDropDown_Config_KeyValue'){
			$results = $this->printDropDown_Config_KeyValue();
		} else {
			$results = $this->printInput();
		}
		
		if ($this->printHidden){
			$results .= $this->printHidden();
		}
		
		
		
		return $results;
		
	}
	
	public function printInput(){
		
		global $APP_CONFIG;
		
		$currentSQL 		= $this->currentSQL;
		$currentTitle		= $this->currentTitle;
		$currentValue		= $this->currentValue;
		$currentPlaceHolder	= $this->currentPlaceHolder;
		$currentLabelClass	= $this->currentLabelClass;
		$currentValueClass	= $this->currentValueClass;
		$componentOnly		= $this->componentOnly;
		$currentOptions		= $this->currentOptions;

		$componentID		= $currentOptions['ComponentID'];
		if ($componentID == ''){
			$componentID = $currentSQL;
		}
		
		$results = '';
		
		if (!$componentOnly){
			$results .= "<div class='form-group row'>";
				$results .= "<label for='{$componentID}' class='{$currentLabelClass} col-form-label'><strong>{$currentTitle}</strong></label>";
				$results .= "<div class='{$currentValueClass}'>";
					$results .= "<input type='text' class='form-control' id='{$componentID}' name='{$componentID}' value='{$currentValue}'>";
					if ($currentPlaceHolder != ''){
						$results .= "<small class='form-text text-muted' id='{$componentID}_plateholder'>{$currentPlaceHolder}</small>";
					}
				$results .= "</div>";
			$results .= "</div>";
		} else {
			$results .= "<input type='text' class='form-control' id='{$componentID}' name='{$componentID}' value='{$currentValue}'>";
		}
		
		return $results;
			
	}


	
	public function printDropDown_Config_KeyValue(){
		
		global $APP_CONFIG;
		
		$currentSQL 			= $this->currentSQL;
		$currentTable			= $this->currentTable;
		$currentTitle			= $this->currentTitle;
		$currentValue			= $this->currentValue;
		$currentPlaceHolder		= $this->currentPlaceHolder;
		$currentLabelClass		= $this->currentLabelClass;
		$currentValueClass		= $this->currentValueClass;
		$currentValueFunction 	= $this->currentValueFunction;
		$componentOnly			= $this->componentOnly;
		$currentDropDownValue	= $this->currentDropDownValue;
		$currentOptions			= $this->currentOptions;
		$currentComponentClass	= $this->currentComponentClass;

		$componentID			= $currentOptions['ComponentID'];
		if ($componentID == ''){
			$componentID = $currentSQL;
		}
		
		
		if (($APP_CONFIG['DICTIONARY'][$currentTable][$currentSQL]['Value_Function'] != '') && function_exists_x($APP_CONFIG['DICTIONARY'][$currentTable][$currentSQL]['Value_Function'])){
			$function 			= $APP_CONFIG['DICTIONARY'][$currentTable][$currentSQL]['Value_Function'];
			$referenceValues	= $function();
		} elseif (($currentValueFunction != '') && function_exists_x($currentValueFunction)){
			$function 			= $currentValueFunction;
			$referenceValues	= $function();
		} else {
			$referenceValues 	= $currentDropDownValue;
		}
		
		if (($currentValue == '') && (!isset($referenceValues[$currentValue])) && (isset($APP_CONFIG['DICTIONARY'][$currentTable][$currentSQL]['Default']))){
			$currentValue = $APP_CONFIG['DICTIONARY'][$currentTable][$currentSQL]['Default'];	
		}
		

		$results = '';
		
		if (!$componentOnly){
			$results .= "<div class='form-group row'>";
				$results .= "<label for='{$componentID}' class='{$currentLabelClass} col-form-label'><strong>{$currentTitle}</strong></label>";
				$results .= "<div class='{$currentValueClass}'>";
		}
		
		if (true){
			
		
			
			$results .= "<select fn='printDropDown_Config_KeyValue' class='form-control {$currentComponentClass}' id='{$componentID}' name='{$componentID}' {$currentOptions['HTML_Attributes_String']}>";
				if ($currentOptions['First_Option_Empty']){
					$results .= "<option value=''>&nbsp;</option>";	
				}
			
				foreach($referenceValues as $currentKey => $currentDisplay){
					
					if ($currentKey == $currentValue){
						$selected = 'selected';	
					} else {
						$selected = '';	
					}
					
					if (strpos($currentKey, "'") === FALSE){
						$results .= "<option value='{$currentKey}' {$selected}>{$currentDisplay}</option>";
					} else {
						$results .= "<option value=\"{$currentKey}\" {$selected}>{$currentDisplay}</option>";
					}
				}
			
			$results .= "</select>";
		}
					
					
		if (!$componentOnly){			
					if ($currentPlaceHolder != ''){
						$results .= "<small class='form-text text-muted' id='{$componentID}_plateholder'>{$currentPlaceHolder}</small>";
					}
				$results .= "</div>";
			$results .= "</div>";
		}
		
		return $results;
			
	}
	
	
	
}

?>