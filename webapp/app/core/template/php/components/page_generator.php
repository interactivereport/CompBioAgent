<?php

//Variables
/*
$PAGE['Title']
$PAGE['Body']
*/

$BXAF_CONFIG['BXAF_PAGE_TITLE'] = $PAGE['Title'];

include('page_generator_header.php');

echo "<body>";
	if (($BXAF_CONFIG['BXAF_PAGE_MENU'] != '') && (is_file($BXAF_CONFIG['BXAF_PAGE_MENU']))){
		include_once($BXAF_CONFIG['BXAF_PAGE_MENU']);
	}

	echo "<div id='bxaf_page_content' class='row no-gutters h-100'>";
		if ($PAGE['Menu_Left_Enable'] && (array_size($BXAF_CONFIG['LEFT_MENU_ITEMS']) > 0) && ($BXAF_CONFIG['BXAF_PAGE_LEFT'] != '') && (is_file($BXAF_CONFIG['BXAF_PAGE_LEFT']))){
			
			
			$BXAF_CONFIG['BXAF_PAGE_CSS_LEFT'] 	= 'col-xxl-2  d-xxl-block col-xl-3 d-xl-block col-lg-3 d-lg-block d-md-none d-sm-none d-none py-2';
			$BXAF_CONFIG['BXAF_PAGE_CSS_RIGHT'] = 'col-xxl-10 col-xl-9 col-lg-9 col-md-10 col-sm-10 col-10 d-flex align-content-between flex-wrap';
			
			include_once($BXAF_CONFIG['BXAF_PAGE_LEFT']);
		} else {
			$BXAF_CONFIG['BXAF_PAGE_CSS_LEFT'] 	= '';
			$BXAF_CONFIG['BXAF_PAGE_CSS_RIGHT'] = 'col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex align-content-between flex-wrap';	
		}

		echo "<div id='bxaf_page_right' class='{$BXAF_CONFIG['BXAF_PAGE_CSS_RIGHT']}'>";

			echo "<div id='bxaf_page_right_content' class='w-100 py-1'>";
            
			
				if ($PAGE['class'] == ''){
					if ($PAGE['Width-Compact']){
						$PAGE['class'] = 'container';
					} else {
						$PAGE['class'] = 'container-fluid';
					}
				}
				
            	echo "<div class='{$PAGE['class']}'>";
					if (($PAGE['Header'] != '') ||($PAGE['Header2'] != '') ||($PAGE['Header3'] != '')){
						echo "<br/>";
						echo "<div class='row'>";
							echo "<div class='col-12'>";
							
								if ($PAGE['Header'] != ''){
									
									if ($PAGE['Header_Icon_File'] != ''){
										echo "<div>
												<h3>
													<img src='{$PAGE['Header_Icon_File']}' height='30'/>&nbsp;
													{$PAGE['Header']}
												</h3>
											</div>";
									} elseif ($PAGE['Header_FontAwesiomeIcon'] != ''){
										echo "<div>
												<h3>
													" . printFontAwesomeIcon($PAGE['Header_FontAwesiomeIcon']) . "&nbsp;{$PAGE['Header']}
												</h3>
											</div>";									} else {
										echo "<div><h3>{$PAGE['Header']}</h3></div>";	
									}
								}
								
								if ($PAGE['Header2'] != ''){

									
										
									if ($PAGE['Header2_Help_Hide_By_Default'] != ''){
										echo "
											<div>
												<span class='h5'>{$PAGE['Header2']}</span>
												&nbsp;&nbsp;
												<span class='h5'>" .
													'<a href="javascript:void(0);" onclick="$(\'#pageHelpContent\').toggle();">' . printFontAwesomeIcon('fas fa-info-circle') . "Help</a>
												</span>
											</div>
											
											<div id='pageHelpContent' class='startHidden'>
												{$PAGE['Header2_Help_Hide_By_Default']}
											</div>";
									} elseif ($PAGE['Header2_Help_Show_By_Default'] != ''){
										echo "
											<div>
												<span class='h5'>{$PAGE['Header2']}</span>
												&nbsp;&nbsp;
												<span class='h5'>
													<a href='javascript:void(0);' id='pageHelpTrigger' status='1'>" . printFontAwesomeIcon('fas fa-info-circle') . 
													"&nbsp;<span id='pageHelpTrigger_Show' class='startHidden'>Show</span><span id='pageHelpTrigger_Hide'>Hide</span><span>&nbsp;Help</span>
													 </a>
												</span>
											</div>
											
											<div id='pageHelpContent'>
												{$PAGE['Header2_Help_Show_By_Default']}
											</div>";
									} else {
										echo "<div>{$PAGE['Header2']}</div>";
									}
									
								}
								
								
								if ($PAGE['Header3'] != ''){
									echo "<p>{$PAGE['Header3']}</p>";
								}
							echo "</div>";
						echo "</div>";
						
						if (!$PAGE['Header_no_hr']){
							echo "<hr/>";	
						}
					}
					
					if (($PAGE['Body'] != '') && (is_file($PAGE['Body']))){
						include($PAGE['Body']);
					} else {
						$message = printFontAwesomeIcon('fas fa-exclamation-triangle text-danger') . ' The $PAGE[Body] variable is empty. Please verify your code and try again.';
						echo getAlerts($message, 'warning');
					}
					
					if (($PAGE['Body2'] != '') && (is_file($PAGE['Body2']))){
						include($PAGE['Body2']);
					}
                   
                echo "</div>";
				
			echo "</div>";

		    if (($BXAF_CONFIG['BXAF_PAGE_FOOTER'] != '') && (is_file($BXAF_CONFIG['BXAF_PAGE_FOOTER']))){
				include_once($BXAF_CONFIG['BXAF_PAGE_FOOTER']);
			}

		echo "</div>";

	echo "</div>";


echo "</body>";
echo "</html>";

?>
<?php if ($PAGE['Header2_Help_Show_By_Default'] != ''){ ?>
<script type="text/javascript">
$(document).ready(function(){
	
	$(document).on('click', '#pageHelpTrigger', function(){
			
		var status = parseInt($(this).attr('status'));
		
		if (status == 1){
			//Showing Now - need to hide
			$('#pageHelpTrigger_Show').show();
			$('#pageHelpTrigger_Hide').hide();
			$('#pageHelpContent').hide();
			$('#pageHelpTrigger').attr('status', '0');
		} else {
			//Hiding Now - need to show
			$('#pageHelpTrigger_Show').hide();
			$('#pageHelpTrigger_Hide').show();
			$('#pageHelpContent').show();
			$('#pageHelpTrigger').attr('status', '1');
		}
	});
	
});
</script>
<?php } ?>