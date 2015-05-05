<?php
// Author: Linmic, email: linmicya@gmail.com
$host = "localhost"; // your db host (ip/dn)
$user = "forum"; // your db's privileged user account
$password = "jvK3pwI8Dt"; // and it's password
$db_name = "forum"; // db name
// $host = "localhost";
// $user = "root";
// $password = "1";
// $db_name = "forum";
$tbl_name = "members"; // table name of the selected db
require($_SERVER['DOCUMENT_ROOT'].'/include/companies.php');
$array = array(
	'sess' => array(
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
									10 => array('value' => 10, 'title' => 'Source e-documents'),
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
									10 => array('value' => 10, 'title' => 'Синхронизация мастер-данных'),
									11 => array('value' => 11, 'title' => 'Лучшие практики <span>ECR</span>'),
									),
		),
	'who' => array(
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
		)
	);
$link = mysql_connect ($host, $user, $password) or die('Could not connect: ' . mysql_error());
mysql_select_db($db_name) or die('Could not select database');
$select = "SELECT * FROM `".$tbl_name."` WHERE 1=1";
if ($_REQUEST['search_company_in_forum']){
	$select .= " AND company_in_forum<>''";
}
if ($_REQUEST['search_last_name']){
	$select .= " AND last_name LIKE '%".$_REQUEST['search_last_name']."%'";
}
if ($_REQUEST['search_company']){
	$select .= " AND company LIKE '%".$_REQUEST['company']."%'";
}

if ($_REQUEST['search_status']){
	$select .= " AND status='".$_REQUEST['search_status']."'";
}


if ($_REQUEST['sort']){
	$select .= " ORDER BY ".$_REQUEST['sort'];
}

if ($_REQUEST['order']){
	$select .= " ".$_REQUEST['order'];
}
mysql_query('SET NAMES utf8;');
$export = mysql_query($select);
//$fields = mysql_num_rows($export); // thanks to Eric
$fields = mysql_num_fields($export); // by KAOSFORGE
for ($i = 0; $i < $fields; $i++) {
$col_title .= '<Cell ss:StyleID="2"><Data ss:Type="String">'.mysql_field_name($export, $i).'</Data></Cell>';
}
$col_title = '<Row>'.$col_title.'</Row>';
$lang = "";
while($row = mysql_fetch_assoc($export)) {
$line = '';

if (!$row['company']){
	$row['company'] = $companies[$row['member']]['title'];
}
foreach($row as $key=>$value) {
	$res = '';
if ($key == 'language' && $language == 'English'){
	$lang = 'English';
}else{
	$lang = 'Русский';
}

if ((!isset($value)) OR ($value == "")) {
$value = '<Cell ss:StyleID="1"><Data ss:Type="String"></Data></Cell>\t';
} else {
	$type = 'String';
	if($key == 'sess' || $key == 'who'){
		foreach(unserialize($value) as $val){
			$res .= $array[$key][$lang][$val]['title'].", ";

		}
		$value = $res;
		
	}

$value = str_replace('"', '', $value);
$value = '<Cell ss:StyleID="1"><Data ss:Type="String">' . $value . '</Data></Cell>\t';
}
$line .= $value;
}
$data .= trim("<Row>".$line."</Row>")."\n";
}
$data = str_replace("\r","",$data);
header("Content-Type: application/vnd.ms-excel;");
header("Content-Disposition: attachment; filename=export.xls");
header("Pragma: no-cache");
header("Expires: 0");
$xls_header = '<?xml version="1.0" encoding="utf-8"?>
<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet" xmlns:html="http://www.w3.org/TR/REC-html40">
<DocumentProperties xmlns="urn:schemas-microsoft-com:office:office">
<Author></Author>
<LastAuthor></LastAuthor>
<Company></Company>
</DocumentProperties>
<Styles>
<Style ss:ID="1">
<Alignment ss:Horizontal="Left"/>
</Style>
<Style ss:ID="2">
<Alignment ss:Horizontal="Left"/>
<Font ss:Bold="1"/>
</Style>
</Styles>
<Worksheet ss:Name="Export">
<Table>';
$xls_footer = '</Table>
<WorksheetOptions xmlns="urn:schemas-microsoft-com:office:excel">
<Selected/>
<FreezePanes/>
<FrozenNoSplit/>
<SplitHorizontal>1</SplitHorizontal>
<TopRowBottomPane>1</TopRowBottomPane>
</WorksheetOptions>
</Worksheet>
</Workbook>';
print $xls_header.$col_title.$data.$xls_footer;
exit;
?>