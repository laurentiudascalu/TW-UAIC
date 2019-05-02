<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$base_url = 'https://';
	} else {
		$base_url = 'http://';
	}
	$base_url .= $_SERVER['HTTP_HOST'];
	$url       = $_SERVER['REQUEST_URI'];

	if(strstr($url,'/despre')){
		require('./pages/despre.php');
	}else{
		require('./pages/home.php');
		exit;
	}
	exit;
?>