<?php
ini_set("display_errors", 1); 
require_once($_SERVER['DOCUMENT_ROOT'].'/include/forms/utils/mysql/query_builder.php');
$mysql = new simple_query_builder();
$mysql->devMode = 1;
$sql = "SELECT * 
FROM  `members` WHERE 1=1";

if ($_REQUEST['search_company_in_forum']){
	$sql .= " AND company_in_forum<>0";
}
if ($_REQUEST['search_last_name']){
	$sql .= " AND last_name LIKE '%".$_REQUEST['search_last_name']."%'";
}
if ($_REQUEST['search_company']){
	$sql .= " AND company LIKE '%".$_REQUEST['company']."%'";
}

if ($_REQUEST['search_status']){
	$sql .= " AND status='".$_REQUEST['search_status']."'";
}


if ($_REQUEST['sort']){
	$sql .= " ORDER BY ".$_REQUEST['sort'];
}

if ($_REQUEST['order']){
	$sql .= " ".$_REQUEST['order'];
}


$tickets = $mysql->select($sql);