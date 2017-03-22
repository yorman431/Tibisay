<?php
	session_start();
	$_url = $_SERVER['PHP_SELF'];
	if ($_SESSION['_estado'] < 1){
		$_SESSION['_estado'] = -1;
		$_SESSION['_url'] = $_url;
		header('location: login.php');
	}
?>