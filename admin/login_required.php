<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/admin/config.php');
	ini_set("display_errors", 0); 
	if(empty($_COOKIE['loggined'])){

		header('Location: /admin/login.php');
	}