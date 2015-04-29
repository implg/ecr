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
		if($key == 'date'){
			//print_r($value); die;
			$mysql->add($key, date('Y-m-d', strtotime($value)));
		}
		
	}

	$mysql->add($key, $value);

}



if ($id){
	$res = $mysql->update('pages', 'id='.$_REQUEST['id']);

}else{
	$res = $mysql->insert('pages');

}


if($res){
	$message =  "Страница успешно изменена";
	header('Location: /admin/events/index.php?message='.$message);	
}else{
	$message =  "Страница не изменена";
	header('Location: /admin/events/edit.php?id='.$_REQUEST['id'].'&message='.$message);
}





			
	