<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/login_required.php');?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/blocks/header.php'); ?>
<?php if ($_REQUEST['id']) :?>
	<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/querysets/content/byid.php'); ?>
<?php endif;?>
	<?php if ($_REQUEST['message']): ?>
				<div id="message-yellow">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="yellow-left"><?php echo $_REQUEST['message']; ?></td>
					<td class="yellow-right"><a class="close-yellow"><img src="/admin/images/table/icon_close_yellow.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
	<?php endif; ?>

<div id="page-heading"><h1><?php if (!$ticket):?>Добавить <?php else: ?>Редактировать <?php endif;?>страницу</h1></div>


<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="/admin/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="/admin/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	
		<a href="/admin/content/index.php"><< Назад в таблицу</a>
		<!--  start step-holder -->
		
		<!--  end step-holder -->
	
		<!-- start id-form -->
		<form action="/admin/querysets/content/save.php" enctype="multipart/form-data" method="post">
		<input type="hidden" value="<?php echo $ticket['id']; ?>" name="id">
		<table border="0" cellpadding="0" cellspacing="0"  width="100%" id="id-form">
		<tr>
			<th width="50%" valign="top">Символьный код</th>
			<td><input type="text" name="alias" value="<?php echo $ticket['alias']; ?>" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th width="50%" valign="top">Заголовок</th>
			<td><input type="text" name="title" value="<?php echo $ticket['title']; ?>" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th width="50%" valign="top">Заголовок (En)</th>
			<td><input type="text" name="title_en" value="<?php echo $ticket['title_en']; ?>" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Текст:</th>
			<td><textarea name="text"  class="form-textarea" ><?php echo $ticket['text']?></textarea></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Текст (En):</th>
			<td><textarea name="text_en"  class="form-textarea" ><?php echo $ticket['text_en']?></textarea></td>
			<td></td>
		</tr>
		<tr>
			<th width="50%" valign="top">Картинка</th>
			<td><input type="file" name="photo"  class="inp-form" /><br><?php if ($ticket['photo']):?><img width="200" src="<?php echo $ticket['photo']; ?>" /><?php endif; ?></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Meta Keywords:</th>
			<td><textarea name="meta_keywords"  class="form-textarea noed" ><?php echo $ticket['meta_keywords']?></textarea></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Meta Keywords (En):</th>
			<td><textarea name="meta_keywords_en"  class="form-textarea noed" ><?php echo $ticket['meta_keywords_en']?></textarea></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Meta Description (En):</th>
			<td><textarea name="meta_description"  class="form-textarea noed" ><?php echo $ticket['meta_description']?></textarea></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Meta Description (En):</th>
			<td><textarea name="meta_description_en"  class="form-textarea noed" ><?php echo $ticket['meta_description_en']?></textarea></td>
			<td></td>
		</tr>



		
	
	
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" class="form-submit" />
			<input type="reset" value="" class="form-reset"  />
		</td>
		<td></td>
	</tr>
	</table>
	</form>
	<!-- end id-form  -->
	<a href="/admin/content/index.php"><< Назад в таблицу</a>
	</td>
	<td>

	

</td>
</tr>
<tr>
<td><img src="/admin/images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>









 





<div class="clear">&nbsp;</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/blocks/footer.php'); ?>