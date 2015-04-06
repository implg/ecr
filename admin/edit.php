<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/login_required.php');?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/blocks/header.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/querysets/byid.php'); ?>
	<?php if ($_REQUEST['message']): ?>
				<div id="message-yellow">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="yellow-left"><?php echo $_REQUEST['message']; ?></td>
					<td class="yellow-right"><a class="close-yellow"><img src="images/table/icon_close_yellow.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
	<?php endif; ?>

<div id="page-heading"><h1>Редактирование заявки № <?php echo $ticket['id'];?></h1></div>


<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	
		<a href="/admin/index.php"><< Назад таблицу</a>
		<!--  start step-holder -->
		
		<!--  end step-holder -->
	
		<!-- start id-form -->
		<form action="/admin/querysets/save.php" method="post">
		<input type="hidden" value="<?php echo $ticket['id']; ?>" name="id">
		<table border="0" cellpadding="0" cellspacing="0"  width="100%" id="id-form">
		<tr>
			<th width="50%" valign="top">Компания является членом ECR Russia?</th>
			<td><input type="checkbox" name="company_in_forum" value="1" <?php if ($ticket['company_in_forum']): ?>checked<?php endif; ?> class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th width="50%" valign="top">Требуется перевод</th>
			<td><input type="checkbox" name="translate" value="1" <?php if ($ticket['translate']): ?>checked<?php endif; ?> class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Язык страницы:</th>
			<td><input type="text" name="language" value="<?php echo $ticket['language'];?>" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Компания:</th>
			<td><input type="text" name="company" value="<?php echo $ticket['company'];?>" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Сайт:</th>
			<td><input type="text" name="site_company" value="<?php echo $ticket['site_company'];?>" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Имя:</th>
			<td><input type="text" name="first_name" value="<?php echo $ticket['first_name'];?>" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Фамилия:</th>
			<td><input type="text" name="last_name" value="<?php echo $ticket['last_name'];?>" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Телефон:</th>
			<td><input type="text" name="phone" value="<?php echo $ticket['phone'];?>" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Email:</th>
			<td><input type="text" name="email" value="<?php echo $ticket['email'];?>" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Должность:</th>
			<td><input type="text" name="position" value="<?php echo $ticket['position'];?>" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Купон:</th>
			<td><input type="text" name="cupon" value="<?php echo $ticket['cupon'];?>" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Количество участников:</th>
			<td><input type="text" name="count" value="<?php echo $ticket['count'];?>" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Какие сессии планируете посетить?:</th>
			<td>
				<select multiple name="sess[]">
					<?php foreach ($ticket['sess_array'] as $sess): ?>
						<option <?php echo $sess['selected'];?>  value="<?php echo $sess['id']; ?>"><?php echo $sess['title']; ?></option>
					<?php endforeach; ?>
				</select>
			</td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Дополнительная информация:</th>
			<td>
				<select multiple name="who[]">
					<?php foreach ($ticket['who_array'] as $sess): ?>
						<option <?php echo $sess['selected'];?>  value="<?php echo $sess['id']; ?>"><?php echo $sess['title']; ?></option>
					<?php endforeach; ?>
				</select>
			</td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">БИК:</th>
			<td><input type="text" name="bik" value="<?php echo $ticket['bik'];?>" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Название банка:</th>
			<td><input type="text" name="bankname" value="<?php echo $ticket['bankname'];?>" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">КС:</th>
			<td><input type="text" name="ks" value="<?php echo $ticket['ks'];?>" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">РС:</th>
			<td><input type="text" name="rs" value="<?php echo $ticket['rs'];?>" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Юридическое название:</th>
			<td><input type="text" name="urname" value="<?php echo $ticket['urname'];?>" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Статус:</th>
			<td>
				<select name="status">
					<option <?php if ($ticket['status'] == 'Registered'):?>selected<?php endif; ?> value="Registered">Registered</option>
					<option <?php if ($ticket['status'] == 'Participant'):?>selected<?php endif; ?> value="Participant">Participant</option>
					<option <?php if ($ticket['status'] == 'Ticket'):?>selected<?php endif; ?> value="Ticket">Ticket</option>
				</select>
				
				
				
				
			</td>
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
	<a href="/admin/index.php"><< Назад таблицу</a>
	</td>
	<td>

	

</td>
</tr>
<tr>
<td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
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