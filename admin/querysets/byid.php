<?php
ini_set("display_errors", 1);
$id = $_REQUEST['id']; 
require_once($_SERVER['DOCUMENT_ROOT'].'/include/forms/utils/mysql/query_builder.php');
$mysql = new simple_query_builder();
$mysql->devMode = 1;
$sql = "SELECT * 
FROM  `members` WHERE id={$id};";

$tickets = $mysql->select($sql);
$ticket = $tickets[0];

$sessions = array(
	'English' => array(
								1 => array('value' => 1, 'title' => '<span>ECR</span> Plenary Session'),
								2 => array('value' => 2, 'title' => '<span>Supply Chain</span> best practices'),
								3 => array('value' => 3, 'title' => 'Shrinkage Reduction'),
								4 => array('value' => 4, 'title' => 'On Shelf Availabillity'),
								5 => array('value' => 5, 'title' => 'Category Management'),
								6 => array('value' => 6, 'title' => 'Shopper Insights'),
								7 => array('value' => 7, 'title' => '<span>Omni Channel Marketing</span>'),
								8 => array('value' => 8, 'title' => 'Electronic Data Interchange (<span>EDI</span>)'),
								9 => array('value' => 9, 'title' => 'E-invoices'),
								10 => array('value' => 10, 'title' => 'Plenary session with commercial directors'),
								11 => array('value' => 11, 'title' => 'Master Data Synchronisation'),
								12 => array('value' => 12, 'title' => 'ECR Best practices'),
								),

							
	'Русский' => array(
								1 => array('value' => 1, 'title' => 'Пленарная сессия <span>ECR</span>'),
								2 => array('value' => 2, 'title' => 'Лучшие практики <span>Supply Chain</span>'),
								3 => array('value' => 3, 'title' => 'Борьба с потерями'),
								4 => array('value' => 4, 'title' => 'Присутствие товара на полке'),
								5 => array('value' => 5, 'title' => 'Категорийный менеджмент'),
								6 => array('value' => 6, 'title' => 'Изучение потребителя'),
								7 => array('value' => 7, 'title' => '<span>Omni Channel</span>'),
								8 => array('value' => 8, 'title' => 'Электронный обмен данными (<span>EDI</span>)'),
								9 => array('value' => 9, 'title' => 'Электронные бухгалтерские документы'),
								10 => array('value' => 10, 'title' => 'Пленарная сессия с коммерческими директорами'),
								11 => array('value' => 11, 'title' => 'Лучшие практики <span>ECR</span>'),
								),

							
	);

$whos = array(
	'English' => array(
								'1' => array('value' => 1, 'title' => 'I am a speaker at the Forum'),
								'2' => array('value' => 2, 'title' => 'My company is a media partner of the Forum'),
								'3' => array('value' => 3, 'title' => 'My company is a sponsor of the Forum'),
								'4' => array('value' => 4, 'title' => 'My company is taking part in the Market-place of the Forum'),
								
								),
	'Русский' => array(
								'1' => array('value' => 1, 'title' => 'Я являюсь докладчиком Форума'),
								'2' => array('value' => 2, 'title' => 'Я представитель информационного партнера Форума'),
								'3' => array('value' => 3, 'title' => 'Я представитель компании-спонсора Форума'),
								'4' => array('value' => 4, 'title' => 'Моя компания — участник выставки'),
								
								),

	);

$sess = array();
foreach ($sessions[$ticket['language'] == 'English' ? $ticket['language'] : 'Русский'] as $session){
	$selsess = unserialize($ticket['sess']);

	if (in_array($session['value'], array_values($selsess))){
		$selected = 'checked';
	}else{
		$selected = '';
	}
	$sess[] = array(
		'id' => $session['value'],
		'title' => $session['title'],
		'selected' => $selected,
		);

}

$ticket['sess_array'] = $sess;


$sess = array();
foreach ($whos[$ticket['language'] == 'English' ? $ticket['language'] : 'Русский'] as $session){
	$selsess = unserialize($ticket['who']);

	if (in_array($session['value'], array_values($selsess))){
		$selected = 'checked';
	}else{
		$selected = '';
	}
	$sess[] = array(
		'id' => $session['value'],
		'title' => $session['title'],
		'selected' => $selected,
		);

}

$ticket['who_array'] = $sess;