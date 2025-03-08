<?php

echo "<!DOCTYPE html>\n";
echo "<html lang='en'>\n";
echo "<head>\n";
    
	$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['Refresh'] = intval(abs_x($BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['Refresh']));
	if ($BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['Refresh'] > 0){
		echo "<meta http-equiv='refresh' content='{$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['Refresh']}'>";
	}
	

	if ($BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['jquery2']){
		echo "<script type='text/javascript' src='./template/js/jquery/2.1.4/jquery.min.js'></script>\n";
	} elseif ($BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['jquery3']){
		echo "<script type='text/javascript' src='./template/js/jquery/3.7.1/jquery.min.js'></script>\n";
	} else {
		echo "<script type='text/javascript' src='./template/js/jquery/1.11.3/jquery.min.js'></script>\n";
		echo "<script type='text/javascript' src='./template/js/jquery-migrate/jquery-migrate-1.2.1.min.js'></script>\n";	
	}
	

	if ($BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['bootstrap5'] || $BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['BootstrapSelect'] || $BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['App_Chat']){
		$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['Popper'] = true;
	}


	if ($BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['Popper']){
		//umd
		//https://cdnjs.com/libraries/popper.js/1.16.1
		if ($BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['bootstrap5']){
			echo "<script type='text/javascript' src='./template/js/popper/2.9.2/popper.min.js'></script>\n";
		} else {
			echo "<script type='text/javascript' src='./template/js/popper/1.16.1/popper.min.js'></script>\n";	
		}
		
	}

	if (true){
		$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['jquery'] 			= false;
		
		if (!isset($BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['bootstrap'])){
			$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['bootstrap'] 	= true;
			$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['bootstrap5'] 	= false;
		}
		
		if (!isset($BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['bootstrap5'])){
			$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['bootstrap5'] 	= false;
		}
		$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['font-awesome'] 		= true;
		$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['tether'] 			= true;
		$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['bootbox'] 			= true;
		
		
		$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['jquery-form']		= true;
		
		if ($BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['jquery-form_DISABLED']){
			$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['jquery-form']		= false;
		}
		


		include_once($BXAF_CONFIG['BXAF_PAGE_HEADER']);
	}

    
    //Application
	if (true){
	    echo "<link type='text/css' rel='stylesheet' href='./template/css/style.css?version=20230710'>\n";
	}
	
    //Application
	if ($BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['bootstrap5']){
	    echo "<link type='text/css' rel='stylesheet' href='./template/css/boostrap5.css?version=20240214'>\n";
	}
	
	
	
	if ($BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['style']){
		echo "<link type='text/css' rel='stylesheet' href='app_style.css?version=20250109'>\n";
	}
    
   
	
	
	
	
		
	if ($BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['BootstrapSelect']){
		if ($BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['bootstrap5']){
			echo "<link rel='stylesheet'         href='./template/js/bootstrap-select/1.14.0-beta3/bootstrap-select.min.css'>\n";
			echo "<script type='text/javascript'  src='./template/js/bootstrap-select/1.14.0-beta3/bootstrap-select.min.js'></script>\n";
		} else {
			echo "<link rel='stylesheet'         href='./template/js/bootstrap-select/1.13.18/bootstrap-select.min.css'>\n";
			echo "<script type='text/javascript'  src='./template/js/bootstrap-select/1.13.18/bootstrap-select.min.js'></script>\n";
		}
	}
	
	
	
	if ($BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['Select2']){
		echo "<link rel='stylesheet'         href='./template/js/select2/4.0.13/select2.min.css'>\n";
		echo "<script type='text/javascript'  src='./template/js/select2/4.0.13/select2.min.js'></script>\n";
	}
	

	
	
	
	
	

	

	
	
	
   
   	if (true){ 
		echo '<!--[if lt IE 9]>' . "\n";
        echo "<script src='./template/js/html5shiv/3.7.3/html5shiv.min.js'></script>\n";
        echo "<script src='./template/js/respond/1.4.2/respond.min.js'></script>\n";
   		echo '<![endif]-->' . "\n";
	}

echo "</head>";

?>