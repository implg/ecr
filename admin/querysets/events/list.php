<?php
ini_set("display_errors", 1); 
require_once($_SERVER['DOCUMENT_ROOT'].'/include/forms/utils/mysql/query_builder.php');
$mysql = new simple_query_builder();
$mysql->devMode = 1;
$sql = "SELECT * 
FROM  `events` WHERE 1=1";



if ($_REQUEST['sort']){
	$sql .= " ORDER BY ".$_REQUEST['sort'];
}

if ($_REQUEST['order']){
	$sql .= " ".$_REQUEST['order'];
}


$tickets = $mysql->select($sql);
