<?php
ini_set("display_errors", 0); 
require_once($_SERVER['DOCUMENT_ROOT'].'/include/forms/utils/mysql/query_builder.php');
$mysql = new simple_query_builder();
$mysql->devMode = 1;
$sql = "SELECT * 
FROM  `speakers` WHERE in_main > 0";



if ($_REQUEST['sort']){
	$sql .= " ORDER BY ".$_REQUEST['sort'];
}

if ($_REQUEST['order']){
	$sql .= " ".$_REQUEST['order'];
}


$speakers = $mysql->select($sql);
