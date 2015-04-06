<?php
ini_set("display_errors", 1); 
require_once($_SERVER['DOCUMENT_ROOT'].'/include/forms/utils/mysql/query_builder.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/include/forms/utils/mail/phpmailer.php');
$mysql = new simple_query_builder();
$mysql->devMode = 1;
$id = $_REQUEST['id'];
$sql = "SELECT * 
FROM  `members` WHERE id={$id};";

$tickets = $mysql->select($sql);
$ticket = $tickets[0];

foreach ($_POST as $key => $value) {
	if($key == 'sess' || $key == 'who'){
		$value = serialize($value);
	}
	$mysql->add($key, $value);

}


if ($ticket['status'] != 'Participant' && $_POST['status'] == 'Participant'){
	$change_status = true;
}else{
	$change_status = false;
}
$res = $mysql->update('members', 'id='.$_REQUEST['id']);

if($change_status){
	
	$email_template = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/admin/mail/participant.php');
	$email_template = str_replace('«', '"', $email_template);
	$email_template = str_replace('»', '"', $email_template);
	$email_template = mb_convert_encoding($email_template, 'KOI8-R', 'UTF-8');
	


	$subject = "Статус заявки изменен на Participant";


	$mail = new PHPMailer(true);
	$mail->Subject = encodeSubject($subject, 'utf-8');
	$mail->AddAddress($_REQUEST['email']);
	$mail->From = 'no-reply@'.$_SERVER['SERVER_NAME'];
	$mail->FromName = isset($email['from_name']) ? mb_convert_encoding($email['from_name'], 'KOI8-R', 'UTF-8') : $_SERVER['SERVER_NAME'];
	$mail->AddReplyTo($email['from'], $email['from_name']);
	$mail->Body  = $email_template;
	$mail->AltBody = strip_tags($email_template);
	
	



	$mail->Send(); 
	$mail->ClearAttachments();
	
}



if($res){
	$message =  "Заявка успешно изменена";
	header('Location: /admin/index.php?message='.$message);	
}else{
	$message =  "Заявка не изменена";
	header('Location: /admin/edit.php?id='.$_REQUEST['id'].'&message='.$message);
}





			
	