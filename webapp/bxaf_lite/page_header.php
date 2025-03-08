<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Description" content="<?php echo $BXAF_CONFIG['BXAF_PAGE_DESCRIPTION']; ?>">
<meta name="Keywords" content="<?php echo $BXAF_CONFIG['BXAF_PAGE_KEYWORDS']; ?>">
<meta name="author" content="<?php echo $BXAF_CONFIG['BXAF_PAGE_AUTHOR'];  ?>">
<title><?php echo $BXAF_CONFIG['BXAF_PAGE_TITLE']; ?></title>

<?php

$BXAF_SYSTEM_SUBDIR = $BXAF_CONFIG['BXAF_SYSTEM_SUBDIR'];
$tempRandom = microtime(true);

if ($BXAF_CONFIG['BXAF_PAGE_APP_URL_ICON'] != ''){
	echo "<link rel='icon' href='{$BXAF_CONFIG['BXAF_PAGE_APP_URL_ICON']}'>\n";
}

if ($BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['jquery']){
	echo "<script src='/{$BXAF_SYSTEM_SUBDIR}library/jquery/jquery.min.js'></script>\n";
}

if ($BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['tether']){
	echo "<link   href='/{$BXAF_SYSTEM_SUBDIR}library/tether/css/tether.min.css' rel='stylesheet'>\n";
	echo "<script src='/{$BXAF_SYSTEM_SUBDIR}library/tether/js/tether.min.js'></script>\n";
}

if ($BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['bootstrap5']){
	echo "<link   href='/{$BXAF_SYSTEM_SUBDIR}library/bootstrap/5.3.3/css/bootstrap.min.css' rel='stylesheet' type='text/css'>\n";
	//echo "<link   href='/{$BXAF_SYSTEM_SUBDIR}library/bootstrap/5.2.3/css/dc-extra.css' rel='stylesheet' type='text/css'>\n";
	echo "<script src='/{$BXAF_SYSTEM_SUBDIR}library/bootstrap/5.3.3/js/bootstrap.min.js'></script>\n";	
} elseif ($BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['bootstrap']){
	echo "<link   href='/{$BXAF_SYSTEM_SUBDIR}library/bootstrap/4.6.2/css/bootstrap.min.css' rel='stylesheet' type='text/css'>\n";
	echo "<link   href='/{$BXAF_SYSTEM_SUBDIR}library/bootstrap/4.6.2/css/dc-extra.css' rel='stylesheet' type='text/css'>\n";
	echo "<script src='/{$BXAF_SYSTEM_SUBDIR}library/bootstrap/4.6.2/js/bootstrap.min.js'></script>\n";
}

if ($BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['font-awesome']){
    echo "<script src='/{$BXAF_SYSTEM_SUBDIR}library/fontawesome5/5.15.4/js/all.min.js'></script>\n";
}

if ($BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['bootbox']){
	echo "<script src='/{$BXAF_SYSTEM_SUBDIR}library/jquery/bootbox.min.js'></script>\n";
}

if ($BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['jquery-md5']){
	echo "<script src='/{$BXAF_SYSTEM_SUBDIR}library/jquery/jquery.md5.js'></script>\n";
}

if ($BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['jquery-form']){
	echo "<script src='/{$BXAF_SYSTEM_SUBDIR}library/jquery/jquery.form.min.js'></script>\n";
}

if ($BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['jquery-tabledit']){
	echo "<script src='/{$BXAF_SYSTEM_SUBDIR}library/jquery/jquery.tabledit.min.js'></script>\n";
}

echo "<link   href='/{$BXAF_SYSTEM_SUBDIR}css/page.css?random={$tempRandom}' rel='stylesheet' type='text/css'>\n";
echo "<script src='/{$BXAF_SYSTEM_SUBDIR}js/page.js?random={$tempRandom}'></script>\n";


if (isset($BXAF_CONFIG['BXAF_PAGE_HEADER_CUSTOM_CSS']) && $BXAF_CONFIG['BXAF_PAGE_HEADER_CUSTOM_CSS'] != ''){
	echo "<link   href='{$BXAF_CONFIG['BXAF_PAGE_HEADER_CUSTOM_CSS']}?random={$tempRandom}' rel='stylesheet' type='text/css'>\n";
}

if (isset($BXAF_CONFIG['BXAF_PAGE_HEADER_CUSTOM_JS']) && $BXAF_CONFIG['BXAF_PAGE_HEADER_CUSTOM_JS'] != ''){
	echo "<script src='{$BXAF_CONFIG['BXAF_PAGE_HEADER_CUSTOM_JS']}?random={$tempRandom}'></script>\n";
}


if(isset($BXAF_CONFIG['BXAF_PAGE_CSS_LEFT_FIXED_WIDTH']) && $BXAF_CONFIG['BXAF_PAGE_CSS_LEFT_FIXED_WIDTH'] != ''){
	echo "\n\n" . '<style>#bxaf_page_left { width: ' . $BXAF_CONFIG['BXAF_PAGE_CSS_LEFT_FIXED_WIDTH'] . '; }' . "\n" .  '#bxaf_page_right { width: calc(100% - ' . $BXAF_CONFIG['BXAF_PAGE_CSS_LEFT_FIXED_WIDTH'] . '); }</style>' . "\n\n";
}

unset($tempRandom);
?>
<style>
@page { 
	size: auto;
}
</style>