<?php 
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$base_url = 'https://';
	} else {
		$base_url = 'http://';
	}
	$base_url .= $_SERVER['HTTP_HOST'];
	$url       = $_SERVER['REQUEST_URI'];
	$activ     = 'home';
	$activCont = '';

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "twuaic";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	    exit;
	}
?>