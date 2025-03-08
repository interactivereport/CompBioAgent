<?php
include_once(dirname(__FILE__) . "/config.php");

if(	isset($BXAF_CONFIG['BXAF_LOGIN_SUCCESS']) &&
	$BXAF_CONFIG['BXAF_LOGIN_SUCCESS'] != '' &&
	$BXAF_CONFIG['BXAF_LOGIN_SUCCESS'] != (rtrim($BXAF_CONFIG['BXAF_ROOT_URL'], '/') . $_SERVER['PHP_SELF'])  &&
	$BXAF_CONFIG['BXAF_LOGIN_SUCCESS'] != $_SERVER['PHP_SELF']){

	header("Location: " . $BXAF_CONFIG['BXAF_LOGIN_SUCCESS']);
	exit();
}
?>