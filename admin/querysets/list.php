<?php
ini_set("display_errors", 1); 
require_once($_SERVER['DOCUMENT_ROOT'].'/include/forms/utils/mysql/query_builder.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/include/forms/companies.php');
$mysql = new simple_query_builder();
$mysql->devMode = 1;
$sql = "SELECT * 
FROM  `members` WHERE 1=1";

if ($_REQUEST['search_company_in_forum']){
	$sql .= " AND company_in_forum = '1'";
}
if ($_REQUEST['search_no_company_in_forum']){
	$sql .= " AND company_in_forum < '1'";
}

if ($_REQUEST['search_last_name']){
	$sql .= " AND last_name LIKE '%".$_REQUEST['search_last_name']."%'";
}
if ($_REQUEST['search_company']){
	$sql .= " AND company LIKE '%".$_REQUEST['search_company']."%'";
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
$newtickets = array();
foreach ($tickets as $item){
	if ($item['member']){
		$item['company'] = $companies[$item['member']];
	}
	$newtickets[] = $item;
}
$tickets = $newtickets;
