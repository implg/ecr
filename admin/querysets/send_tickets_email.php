<?php

	ini_set("display_errors", 1); 
require_once($_SERVER['DOCUMENT_ROOT'].'/include/forms/utils/mysql/query_builder.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/include/forms/utils/mail/phpmailer.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/include/companies.php' );
$mysql = new simple_query_builder();
$mysql->devMode = 1;
$sql = "SELECT * 
FROM  `members` WHERE status='Ticket'";


$tickets = $mysql->select($sql);
foreach ($tickets as $ticket){

	$email  = $ticket['email'];
	$password = md5($email.'_ecr_forum_key');

	$email_template = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/admin/mail/showlink.php');
	$email_template = str_replace('«', '"', $email_template);
	$email_template = str_replace('»', '"', $email_template);


	$email_template = str_replace('%email%', $email, $email_template);
	$email_template = str_replace('%password%', $password, $email_template);
	$email_template = mb_convert_encoding($email_template, 'KOI8-R', 'UTF-8');
	


	$subject = "Материалы Одиннадцатого Ежегодного ECR Форума";
	$email = 'wikedwolf@yandex.ru';

	$mail = new PHPMailer(true);
	$mail->Subject = encodeSubject($subject, 'utf-8');
	$mail->AddAddress($email);
	$mail->From = 'no-reply@'.$_SERVER['SERVER_NAME'];
	$mail->FromName = isset($email['from_name']) ? mb_convert_encoding($email['from_name'], 'KOI8-R', 'UTF-8') : $_SERVER['SERVER_NAME'];
	$mail->AddReplyTo($email['from'], $email['from_name']);
	$mail->Body  = $email_template;
	$mail->AltBody = strip_tags($email_template);
	
	



	$mail->Send(); 
	$mail->ClearAttachments();
}
?>