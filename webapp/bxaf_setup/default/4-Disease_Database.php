<?php

/*
Disease Definition
*/

//Example
//Key = Disease Name, e.g., Alzheimer's Disease (AD)
//Notice that the disease name you use needs to be available in the prompt function (See 5-Prompt.php)
//The project is based on https://cellxgene.cziscience.com/e/c2876b1b-06d8-4d96-a56b-5304f815b99a.cxg/
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']["Alzheimer's Disease (AD)"] = array();

//A link to the h5ad file.
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']["Alzheimer's Disease (AD)"]['URL_About']
	= 'https://app.bxgenomics.com/bxg/app/scrnaview/app_project_review.php?ID=499';
	
//A link to the Cellxgene VIP of the h5ad file
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']["Alzheimer's Disease (AD)"]['URL_CellxgeneVIP']
	= 'https://app.bxgenomics.com/bxg/app/scrnaview/app_project_launcher.php?ID=499';
	
//The Cell Type column of the h5ad dataset.
//Usually this is defined by the researcher who create h5ad file.
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']["Alzheimer's Disease (AD)"]['Project_Column_Mapping']['Cell Type'] 
	= 'Class';
	
//The Disease column of the h5ad dataset.
//Usually this is defined by the researcher who create h5ad file.
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']["Alzheimer's Disease (AD)"]['Project_Column_Mapping']['Disease']   
	= 'disease';
	
//The complete file path of the h5ad file.
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']["Alzheimer's Disease (AD)"]['File_Raw']		
	= '/data/c2876b1b-06d8-4d96-a56b-5304f815b99a.h5ad';
	
//The complete file path of the slim version of the h5ad file.
//If you don't have the slim version, leave it blank.
//See here : https://github.com/interactivereport/cellxgene_VIP/blob/master/bin/slimH5ad.sh
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']["Alzheimer's Disease (AD)"]['File_Slim']		
	= '/data/c2876b1b-06d8-4d96-a56b-5304f815b99a_slim.h5ad';
	
//If the dataset was downloaded from CZI, please set the value to true.
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']["Alzheimer's Disease (AD)"]['Download_From_CZI'] 
	= true;
	
//Sometimes, the LLM may return a non-standard disease name. It is ncessary to include the nick names here.
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']["Alzheimer's Disease (AD)"]['Alias'][] = "Alzheimer's Disease";
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']["Alzheimer's Disease (AD)"]['Alias'][] = 'Alzheimers';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']["Alzheimer's Disease (AD)"]['Alias'][] = 'AD';





//Example
//Cutaneous lupus erythematosus (CLE)
//Project: GSE186476
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Cutaneous lupus erythematosus (CLE)'] = array();
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Cutaneous lupus erythematosus (CLE)']['URL_About']
   	= 'https://app.bxgenomics.com/bxg/app/scrnaview/app_project_review.php?ID=1049';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Cutaneous lupus erythematosus (CLE)']['URL_CellxgeneVIP']
   	= 'https://app.bxgenomics.com/bxg/app/scrnaview/app_project_launcher.php?ID=1049';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Cutaneous lupus erythematosus (CLE)']['Project_Column_Mapping']['Cell Type'] 
	= 'celltype';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Cutaneous lupus erythematosus (CLE)']['Project_Column_Mapping']['Disease']   
	= 'tissue';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Cutaneous lupus erythematosus (CLE)']['File_Raw']		
 	= '/data/GSE186476.h5ad';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Cutaneous lupus erythematosus (CLE)']['File_Slim']		
 	= '/data/GSE186476_slim.h5ad';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Cutaneous Lupus Erythematosus (CLE)']['Download_From_CZI'] = false;
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Cutaneous Lupus Erythematosus (CLE)']['Alias'][] = 'Cutaneous Lupus Erythematosus';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Cutaneous Lupus Erythematosus (CLE)']['Alias'][] = 'CLE';




//Example
//Glaucoma
//Project: SCP780
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Glaucoma'] = array();
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Glaucoma']['URL_About']
   	= 'https://app.bxgenomics.com/bxg/app/scrnaview/app_project_review.php?ID=174';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Glaucoma']['URL_CellxgeneVIP']
   	= 'https://app.bxgenomics.com/bxg/app/scrnaview/app_project_launcher.php?ID=174';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Glaucoma']['Project_Column_Mapping']['Cell Type'] 
	= 'Cluster';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Glaucoma']['Project_Column_Mapping']['Disease']   
	= 'Disease';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Glaucoma']['File_Raw']		
	= '/data/SCP780.h5ad';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Glaucoma']['File_Slim']		
	= '/data/SCP780_slim.h5ad';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Glaucoma']['Download_From_CZI'] = false;
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Glaucoma']['Alias'] = array();
	
	
	
	
//Example
//Multiple Sclerosis (MS)
//MS_Nature_2019_Rowitch
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Multiple Sclerosis (MS)'] = array();
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Multiple Sclerosis (MS)']['URL_About']
   	= 'https://app.bxgenomics.com/bxg/app/scrnaview/app_project_review.php?ID=423';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Multiple Sclerosis (MS)']['URL_CellxgeneVIP']
   	= 'https://app.bxgenomics.com/bxg/app/scrnaview/app_project_launcher.php?ID=423';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Multiple Sclerosis (MS)']['Project_Column_Mapping']['Cell Type'] 
	= 'cell_type';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Multiple Sclerosis (MS)']['Project_Column_Mapping']['Disease']   
	= 'diagnosis';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Multiple Sclerosis (MS)']['File_Raw']		
	= '/data/ms_nature_2019_rowitch_LLM.h5ad';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Multiple Sclerosis (MS)']['File_Slim']		
	= '/data/ms_nature_2019_rowitch_LLM_slim.h5ad';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Multiple Sclerosis (MS)']['Alias'][] = 'Multiple Sclerosis';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Multiple Sclerosis (MS)']['Alias'][] = 'MS';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Multiple Sclerosis (MS)']['Download_From_CZI'] = false;


//Systemic lupus erythematosus (SLE)
//GSE137029
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Systemic lupus erythematosus (SLE)'] = array();
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Systemic lupus erythematosus (SLE)']['URL_About']
   	= 'https://app.bxgenomics.com/bxg/app/scrnaview/app_project_review.php?ID=1050';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Systemic lupus erythematosus (SLE)']['URL_CellxgeneVIP']
   	= 'https://app.bxgenomics.com/bxg/app/scrnaview/app_project_launcher.php?ID=1050';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Systemic lupus erythematosus (SLE)']['Project_Column_Mapping']['Cell Type'] 
	= 'cell_type';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Systemic lupus erythematosus (SLE)']['Project_Column_Mapping']['Disease']   
	= 'disease_state';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Systemic lupus erythematosus (SLE)']['File_Raw']		
	= '/data/GSE137029_v3.h5ad';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Systemic lupus erythematosus (SLE)']['File_Slim']		
	= '/data/GSE137029_v3_slim.h5ad';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Systemic Lupus Erythematosus (SLE)']['Alias'][] = 'Systemic Lupus Erythematosus';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Systemic Lupus Erythematosus (SLE)']['Alias'][] = 'SLE';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Systemic Lupus Erythematosus (SLE)']['Download_From_CZI'] = false;


//Diabetes
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Diabetes'] = array();
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Diabetes']['URL_About']
   	= 'https://app.bxgenomics.com/bxg/app/scrnaview/app_project_review.php?ID=1051';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Diabetes']['URL_CellxgeneVIP']
   	= 'https://app.bxgenomics.com/bxg/app/scrnaview/app_project_launcher.php?ID=1051';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Diabetes']['Project_Column_Mapping']['Cell Type'] 
	= 'C1_named';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Diabetes']['Project_Column_Mapping']['Disease']   
	= 'Disease';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Diabetes']['File_Raw']		
	= '/data/d3504c65-42cd-4629-af87-2cc4547ce65b.h5ad';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Diabetes']['File_Slim']		
	= '/data/d3504c65-42cd-4629-af87-2cc4547ce65b_slim.h5ad';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Diabetes']['Alias'][] = 'Type 1 Diabetes';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Diabetes']['Alias'][] = 'Type 2 Diabetes';
$BXAF_CONFIG_CUSTOM['SETTINGS']['data']['By-Disease']['Diabetes']['Download_From_CZI'] = true;


//Keep in mind that if you've added any disease, you will need to modify the prompt function:
///var/www/html/compbioagent/core/lib_app_ai_assistant_prompt.php
//Look for "Diabetes" for example.



//Here are the example questions displayed in the CompbioAid
//Feel free to modify the example questions to match your interest.
$BXAF_CONFIG_CUSTOM['SETTINGS']['AI_Assistant_v2']['Example_Questions'][1] = 'Give me gene expression of TYK2 in MS disease separated by disease vs. control.';
$BXAF_CONFIG_CUSTOM['SETTINGS']['AI_Assistant_v2']['Example_Questions'][2] = 'Show TYK2 UMAP plots in MS Disease, separate the plot by disease condition, and show cell types.';
$BXAF_CONFIG_CUSTOM['SETTINGS']['AI_Assistant_v2']['Example_Questions'][3] = 'Show proportions of each cell type in disease and control states for multiple sclerosis.';
$BXAF_CONFIG_CUSTOM['SETTINGS']['AI_Assistant_v2']['Example_Questions'][4] = 'Generate heatmap of gene expression in cutaneous lupus erythematosus for the following genes: HLA-B8, SAMHD1,PECAM1, KRT1, CD3D, VIM, MYH11.  Group cells by disease and cell type.';
$BXAF_CONFIG_CUSTOM['SETTINGS']['AI_Assistant_v2']['Example_Questions'][5] = 'Show expression of top 10 cell cycle related genes in glaucoma single-cell data';
$BXAF_CONFIG_CUSTOM['SETTINGS']['AI_Assistant_v2']['Example_Questions'][6] = 'Show UMAP plots in Diabetes, separate the plot by disease condition, and show cell types.';




?>