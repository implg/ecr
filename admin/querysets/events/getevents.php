<?php
ini_set("display_errors", 1); 
require_once($_SERVER['DOCUMENT_ROOT'].'/include/forms/utils/mysql/query_builder.php');
$mysql = new simple_query_builder();
$mysql->devMode = 1;
$sql = "SELECT * 
FROM  `events` WHERE 1=1";




$sql .= " ORDER BY day, time_start, time_end";

if ($_REQUEST['order']){
	$sql .= " ".$_REQUEST['order'];
}


$tickets = $mysql->select($sql);

$byday = array();
foreach ($tickets as $item) {
	$day = date('d', strtotime($item['day']));
	$time_start = str_replace(':', '_', $item['time_start']);
	if (!$byday[$day]){
		$byday[$day] = array();
	}
	if (!$byday[$day][$time_start]){
		$byday[$day][$time_start] = array();
	}
	$byday[$day][] = $item;

}
?>