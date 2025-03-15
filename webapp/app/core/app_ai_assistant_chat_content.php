<?php

echo "<link href='app_ai_assistant_chat_style.css' rel='stylesheet' type='text/css'>";

echo "<div class='row' id='main_container'>";

  if (true){
    $classLeft = "col-xxl-2 col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12";
    echo "<div class='side-nav {$classLeft}'>";
	
		echo "<h4 class='py-5'>" . printFontAwesomeIcon("fas fa-cog") . " Options</h4>";
	
		if (true){
			foreach(array('Cutoff',	'Color', 'img_height', 'img_width', 'dotsize', 'titlefontsize','Model')	as $tempKey => $currentColumn){
				echo "<div class='row'>";
					echo "<div class='col-12'>";
						$options = array();
						$options['Column'] 				= $currentColumn;
						$options['Table'] 				= $currentTable;
						$options['First_Option_Empty'] 	= $APP_CONFIG['DICTIONARY'][$currentTable][$currentColumn]['First_Option_Empty'];
						
						if ($ID > 0){
							$options['Value']	= $dataArray[$currentColumn];	
						} else {
							$options['Value']	= $APP_CONFIG['DICTIONARY'][$currentTable][$currentColumn]['Default'];	
						}
										
						echo "<div id='{$currentColumn}_Section'>";
							$currentFormObj = new HTML_Form($options);
							echo $currentFormObj->printHTMLForm();
						echo "</div>";
					echo "</div>";
				echo "</div>";
				
				
			}
			
			
		}
	

      echo "<hr/>";

      if (1){
        echo "<div class='row'>";
          echo "<div class='col-12'>";
			
			echo "<button id='updateSettingTrigger' class='btn btn-warning'>" . printFontAwesomeIcon('fas fa-sync-alt') . " Update</button>";

          echo "</div>";
        echo "</div>";
      }

    echo "</div>";
  }


  if (true){

    $classRight = "col-xxl-10 col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12";
    echo "<div class='content p-0 pt-2 {$classRight}'>";
      if (true){
        echo "<div id='chat-content-area'>";
          echo "<div class='row gpt-chat-box'>";
            echo "<div class='chat-icon'>
                    <img class='chatgpt-icon' src='images/dna-svgrepo-com.svg' />
                  </div>";

            echo "<div class='chat-txt'>
					<p>{$BXAF_CONFIG['MESSAGE'][$currentTable]['General']['Greeting']}</p>";

					if (array_size($BXAF_CONFIG['SETTINGS']['AI_Assistant_v2']['Example_Questions']) > 0){
						echo "<ol>";
					
						foreach($BXAF_CONFIG['SETTINGS']['AI_Assistant_v2']['Example_Questions'] as $questionKey => $currentQuestion){
							echo "<li><a href='javascript:void(0);' class='exampleTrigger' question='{$questionKey}'>{$currentQuestion}</a></li>";
						}
						echo "</ol>";	
					}
					
						
			echo "<p>{$BXAF_CONFIG['MESSAGE'][$currentTable]['General']['Supported_Disease_Message']}<br/>";
				echo implode_x(", ", array_keys($BXAF_CONFIG['SETTINGS']['data']['By-Disease']));
			echo "</p>";
			
			echo "<p><a href='app_ai_assistant_example.php'>" . printFontAwesomeIcon("far fa-question-circle") . " {$BXAF_CONFIG['MESSAGE'][$currentTable]['General']['More_Examples']}</a></p>";

			echo "</div>";
          echo "</div>";
        echo "</div>";
      }

      if (true){
		
        echo "<div class='chat-input-area overflow-hidden'>";
          echo "<div class='row'>
                  <div class='col-12 chat-inputs-area-inner'>
                    <div class='row chat-inputs-container d-flex align-items-center'>
                      	<textarea name='query_box' id='query_box' class='col-11' placeholder='Please enter your question.' rows='4'>{$query}</textarea>
						<input id='last_question' type='hidden' value=''/>

						<div class='col-1'>
                      	<button class='btn btn-primary text-white' id='submit_query'>" . printFontAwesomeIcon("far fa-paper-plane text-white") .
							"Submit
                      	</button>
						</div>
					  <h4 id='busySection' class='startHidden' style='color:#333;'>" . printFontAwesomeIcon('fas fa-spinner fa-spin fa-lg'). "</h4>
                    </div>
					
                  </div>
                </div>";
        echo "</div>";

		
      }
    echo "</div>";
  }
  
  
  echo "</div>";
  
  
  if ($BXAF_CONFIG['SETTINGS']['AI_Assistant_v2']['pre-load'] != ''){
		echo "<iframe src='{$BXAF_CONFIG['SETTINGS']['AI_Assistant_v2']['pre-load']}' style='display:none;'></iframe>";
  }

  
?>

<script type="text/javascript">

$(document).ready(function(){

	$("#submit_query").click(function(){
		let query 			= $('#query_box').val();
		
		
		let query_string = '';
		
		query_string += '<div class="row user-chat-box">';
			query_string += '<div class="chat-icon"><img class="chatgpt-icon" src="images/user-icon.png" /></div>';
			query_string += '<div class="chat-txt">';
				query_string += query;
			query_string += '</div>';
		query_string += '</div>';
		
		
		if (query != ''){
			$('#last_question').val(query);

			$('#busySection').show();
			$('#chat-content-area').append(query_string);
			$('#chat-content-area').scrollTop($('#chat-content-area')[0].scrollHeight);

			$.ajax({
				type: 'POST',
				url: '<?php echo "{$PAGE['AJAX']}?action=submit_query"; ?>',
				data: {
					'query': 			query,
					'Model': 			$('#Model').val(),
					'img_width': 		$('#img_width').val(),
					'img_height': 		$('#img_height').val(),
					'dotsize': 			$('#dotsize').val(),
					'titlefontsize': 	$('#titlefontsize').val(),
					'Color': 			$('#Color').val(),
					'Cutoff': 			$('#Cutoff').val(),

				}, 
				success: function(response) {
					
					var model_name = ($("#Model option:selected").text());


					$('#busySection').hide();

					let answer_string = '';
					answer_string += '<div class="row gpt-chat-box">';
						answer_string += '<div class="chat-icon">';
							answer_string += '<img class="chatgpt-icon" src="images/dna-svgrepo-com.svg" />';
							answer_string += model_name;
						answer_string += '</div>';
						answer_string += '<div class="chat-txt">';  
							answer_string += response;
						answer_string += '</div>';
					answer_string += '</div>';
					
					
					$('#chat-content-area').append(answer_string);

					$('#chat-content-area').scrollTop($('#chat-content-area')[0].scrollHeight);
					
					$('#query_box').val('');
					
				},
				error: function() {
					
				}
			});
		}
	});


	$(document).on('click', '.exampleTrigger', function(){
		
		var value = $(this).attr('question');
		value = parseInt(value);
		var question = '';
		
		<?php foreach($BXAF_CONFIG['SETTINGS']['AI_Assistant_v2']['Example_Questions'] as $questionKey => $currentQuestion){ ?>
		if (value == <?php echo intval($questionKey); ?>){
			question = '<?php echo $currentQuestion; ?>';
		}
		<?php } ?>
		

		if (question != ''){
			$('#query_box').val(question);
			$('#submit_query').click();
		}
	});

	$(document).on('click', '#updateSettingTrigger', function(){
		var question = $('#last_question').val();
		if (question != ''){
			$('#query_box').val(question);
			$('#submit_query').click();
		}
	});

	<?php if ($query != ''){ ?>
		$("#submit_query").click();
	<?php } ?>


});
</script>