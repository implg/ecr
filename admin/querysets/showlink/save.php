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

if ($_FILES['photo']){
	$uploaddir = $_SERVER['DOCUMENT_ROOT'].'/admin/uploads/';
	$uploadfile = $uploaddir . basename(md5(date('d.m.Y H:i:s')).$_FILES['photo']['name']);

	if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {

		$mysql->add('photo', str_replace($_SERVER['DOCUMENT_ROOT'], '', $uploadfile));
	}
}


if ($id){
	$res = $mysql->update('showlink', 'id='.$_REQUEST['id']);

}else{
	$res = $mysql->insert('showlink');

}


if($res){
	$message =  "Заявка успешно изменена";
	header('Location: /admin/showlink/index.php?message='.$message);	
}else{
	$message =  "Заявка не изменена";
	header('Location: /admin/showlink/edit.php?id='.$_REQUEST['id'].'&message='.$message);
}





			
	