<?php
ini_set("display_errors", 1); 
require_once($_SERVER['DOCUMENT_ROOT'].'/include/forms/utils/mysql/query_builder.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/include/forms/utils/mail/phpmailer.php');
$mysql = new simple_query_builder();
$mysql->devMode = 1;
$id = $_REQUEST['id'];


foreach ($_POST as $key => $value) {
	if($key == 'sess' || $key == 'who'){
		$vals = array();
		
		foreach ($value as $val){
			
				$vals[] = $val;
			
			
		}

		$value = serialize($vals);
		if($key == 'sess'){
			//print_r($value); die;
		}
		
	}

	$mysql->add($key, $value);

}


if ($id){
	$res = $mysql->update('programms', 'id='.$_REQUEST['id']);

}else{
	$res = $mysql->insert('programms');

}


if($res){
	$message =  "Заявка успешно изменена";
	header('Location: /admin/programms/index.php?message='.$message);	
}else{
	$message =  "Заявка не изменена";
	header('Location: /admin/programms/edit.php?id='.$_REQUEST['id'].'&message='.$message);
}





			
	