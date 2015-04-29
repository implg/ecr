<?php
ini_set("display_errors", 1);

require_once($_SERVER['DOCUMENT_ROOT'].'/include/forms/utils/mysql/query_builder.php');
$mysql = new simple_query_builder();
$mysql->devMode = 1;
$sql = "SELECT * 
FROM  `pages` WHERE alias={$pagecode};";

$tickets = $mysql->select($sql);
$page = $tickets[0];