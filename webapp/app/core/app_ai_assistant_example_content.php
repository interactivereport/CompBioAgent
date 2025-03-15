<?php


echo "<div class='containers'>";

$queries = $BXAF_CONFIG['MESSAGE'][$currentTable]['General']['Examples_Queries'];
$queries = explode("\n", $queries);
$queries = array_filter($queries, 'trim');
$queries = array_unique($queries);


echo "<ul>";
foreach($queries as $tempKey => $currentQuery){
	
	$URL = "app_ai_assistant_chat.php?q={$currentQuery}";
	
	echo "<li><a href='{$URL}' target='_blank'>{$currentQuery}</a></li>";
	
	
}
echo "</ul>";



 

echo "</div>";
?>


