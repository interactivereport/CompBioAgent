<?php

ini_set('zlib.output_compression','On');
ini_set('display_errors', '0');
ini_set('session.auto_start', '0');
ini_set('session.use_cookies', '1');
ini_set('session.gc_maxlifetime', 43200); // 12 hours
ini_set('register_globals', '0');
ini_set('auto_detect_line_endings', true);
ini_set('session.cookie_httponly', '1');

session_set_cookie_params (0);
session_cache_limiter('nocache');

if ($_SERVER['SESSION_NAME'] == ''){
	session_name('BIOINFORX_SESSION_' . md5(dirname(__FILE__)));
} else {
	session_name($_SERVER['SESSION_NAME']);
}

session_start();
error_reporting(0);




?>