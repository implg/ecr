<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/admin/config.php');
	print 1;
	session_start();
	print 2;
	if(empty($_COOKIE['loggined'])){

		header('Location: /admin/login.php');
	}