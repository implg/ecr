<?php
ini_set("display_errors", 1); 
require_once($_SERVER['DOCUMENT_ROOT'].'/include/forms/utils/mysql/query_builder.php');
$mysql = new simple_query_builder();
$mysql->devMode = 1;


$res = $mysql->delete('events', $_REQUEST['id']);

if($res){
	$message =  "Страница успешно удалена";
	header('Location: /admin/index.php?message='.$message);	
}
