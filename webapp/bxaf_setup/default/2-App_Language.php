<?php

$currentTable = 'App_AI_Assistant_Chat';

//Chat Title/Wording
if (true){
	
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['General']['Brand']
		= 'CompBioAgent';
		
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['General']['Greeting']
		= 'Welcome to CompBioAgent. Please ask me single cell related question. Here are five types of training questions I have been trained (please click on the links to try):';
		
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['General']['Supported_Disease_Message']
		= 'Currently the database supports the following diseases:';
		
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['General']['More_Examples']
		= 'Please click here for more example questions';
		
		
		
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['General']['Examples']
		= 'Example Questions';
		
		
	$BXAF_CONFIG_CUSTOM['MESSAGE'][$currentTable]['General']['Examples_Queries']
		= "
Give me gene expression of TYK2 in MS disease separated by disease vs. control.
Give me gene expression of TYK2 in AD disease separated by disease vs. control.
Give me gene expression of TYK2 in CLE disease separated by disease vs. control.
Give me gene expression of TYK2 in Diabetes disease separated by disease vs. control.
Give me gene expression of TYK2 in Glaucoma disease separated by disease vs. control.
Give me gene expression of TYK2 in SLE disease separated by disease vs. control.


Show TYK2 UMAP plots in MS Disease, separate the plot by disease condition, and show cell types.
Show TYK2 UMAP plots in AD, separate the plot by disease condition, and show cell types.
Show TYK2 UMAP plots in CLE, separate the plot by disease condition, and show cell types.
Show TYK2 UMAP plots in Diabetes, separate the plot by disease condition, and show cell types.
Show TYK2 UMAP plots in Glaucoma, separate the plot by disease condition, and show cell types.
Show TYK2 UMAP plots in SLE, separate the plot by disease condition, and show cell types.

Show proportions of each cell type in disease and control states for multiple sclerosis.
Show proportions of each cell type in disease and control states for AD.
Show proportions of each cell type in disease and control states for CLE.
Show proportions of each cell type in disease and control states for Diabetes.
Show proportions of each cell type for Diabetes.
Show proportions of each cell type in disease and control states for Glaucoma.
Show proportions of each cell type for Glaucoma.
Show proportions of each cell type in disease and control states for SLE.

Generate heatmap of gene expression in cutaneous lupus erythematosus for the following genes: HLA-B8, SAMHD1,PECAM1, KRT1, CD3D, VIM, MYH11. Group cells by disease and cell type.
Generate heatmap of gene expression in AD for the following genes: TYK2, GFAP. Group cells by disease and cell type.
Generate heatmap of gene expression in MS for the following genes: TYK2, CD22. Group cells by disease and cell type.
Generate heatmap of gene expression in Diabetes for the following genes: TYK2, CD22. 
Generate heatmap of gene expression in Glaucoma for the following genes: TYK2, CD22. Group cells by disease and cell type.
Generate heatmap of gene expression in SLE for the following genes: TYK2, CD22. Group cells by disease and cell type.

Show expression of top 10 cell cycle related genes in glaucoma single-cell data.
Show expression of top 10 cell cycle related genes in AD single-cell data.
Show expression of top 10 cell cycle related genes in CLE single-cell data.
Show expression of top 10 cell cycle related genes in Diabetes single-cell data.
Show expression of top 10 cell cycle related genes in SLE single-cell data.
Show expression of top 10 cell cycle related genes in MS single-cell data.

Show UMAP plots in Diabetes, separate the plot by disease condition, and show cell types.
Show UMAP plots in AD, separate the plot by disease condition, and show cell types.
Show UMAP plots in MS, separate the plot by disease condition, and show cell types.
Show UMAP plots in Glaucoma, separate the plot by disease condition, and show cell types.
Show UMAP plots in SLE, separate the plot by disease condition, and show cell types.
Show UMAP plots in CLE, separate the plot by disease condition, and show cell types.

";


		
		
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