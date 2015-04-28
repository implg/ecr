<?php
ini_set("display_errors", 1);
$id = $_REQUEST['id']; 
require_once($_SERVER['DOCUMENT_ROOT'].'/include/forms/utils/mysql/query_builder.php');
$mysql = new simple_query_builder();
$mysql->devMode = 1;
$sql = "SELECT * 
FROM  `speakers` WHERE id={$id};";

$tickets = $mysql->select($sql);
$ticket = $tickets[0];