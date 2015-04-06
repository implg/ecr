<?php
ini_set("display_errors", 1); 
require_once($_SERVER['DOCUMENT_ROOT'].'/include/forms/utils/mysql/query_builder.php');
$mysql = new simple_query_builder();
$mysql->devMode = 1;

foreach ($_POST as $key => $value) {
	if($key == 'sess' || $key == 'who'){
		$value = serialize($value);
	}
	$mysql->add($key, $value);

}
$res = $mysql->update('members', 'id='.$_REQUEST['id']);

if($res){
	$message =  "Заявка успешно изменена";
	header('Location: /admin/index.php?message='.$message);	
}else{
	$message =  "Заявка не изменена";
	header('Location: /admin/edit.php?id='.$_REQUEST['id'].'&message='.$message);
}
