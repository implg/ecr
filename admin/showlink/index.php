<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/login_required.php');?>
<?php $show_search = true;?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/blocks/header.php'); ?>
	<?php if ($_REQUEST['message']): ?>
				<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left"><?php echo $_REQUEST['message']; ?></td>
					<td class="green-right"><a class="close-green"><img src="/admin/images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
	<?php endif; ?>
	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Все запросы</h1>
	</div>
	<!-- end page-heading -->

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
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			
				
		 
				<!--  start product-table ..................................................................................... -->
				<?php
					$order = $_REQUEST['order'];
					$sort = $_REQUEST['sort'];
					$get = "";
					$get_with_sort = "";
					foreach ($_GET as $key=>$val){
						if($key != 'sort' && $key != 'order'){
							$get .= "&$key=$val";	
						}
						$get_with_sort .= "&$key=$val";	
						
					}
				?>
				
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="?sort=id<?php echo $get; ?>&order=<?php if($sort == 'id'):?><?php if ($order == 'ASC'): ?>DESC<?php else: ?>ASC<?php endif; ?><?php else: ?>ASC<?php endif; ?>">№</a>	</th>
					
					<th class="table-header-repeat line-left minwidth-1"><a href="?sort=name<?php echo $get; ?>&order=<?php if($sort == 'name'):?><?php if ($order == 'ASC'): ?>DESC<?php else: ?>ASC<?php endif; ?><?php else: ?>ASC<?php endif; ?>">Имя</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="?sort=surname<?php echo $get; ?>&order=<?php if($sort == 'surname'):?><?php if ($order == 'ASC'): ?>DESC<?php else: ?>ASC<?php endif; ?><?php else: ?>ASC<?php endif; ?>">Фамилия</a></th>
					<th class="table-header-repeat line-left"><a href="?sort=email<?php echo $get; ?>&order=<?php if($sort == 'email'):?><?php if ($order == 'ASC'): ?>DESC<?php else: ?>ASC<?php endif; ?><?php else: ?>ASC<?php endif; ?>">E-mail</a></th>
					<th class="table-header-repeat line-left"><a class="no_arrow">Телефон</a></th>
					<th class="table-header-repeat line-left"><a href="?sort=company<?php echo $get; ?>&order=<?php if($sort == 'company'):?><?php if ($order == 'ASC'): ?>DESC<?php else: ?>ASC<?php endif; ?><?php else: ?>ASC<?php endif; ?>">Компания</a></th>
					
					<th class="table-header-repeat line-left"><a class="no_arrow" >Сайт</a></th>
					<th class="table-header-repeat line-left"><a class="no_arrow" >Должность</a></th>
					
					<th class="table-header-repeat"></th>
					<th class="table-header-repeat"></th>
				</tr>
				<?php

					ini_set("display_errors", 1); 

				?>
				<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/querysets/showlink/list.php'); ?>
				<?php foreach ($tickets as $ticket){ ?>
					<tr>
						
						<td><?php echo $ticket['id'];?></td>
						<td><?php echo $ticket['name'];?></td>
						<td><?php echo $ticket['surname'];?></td>
						<td><a href="mailto:<?php echo $ticket['email'];?>"><?php echo $ticket['email'];?></a></td>
						<td><?php echo $ticket['phone'];?></td>
						<td><?php echo $ticket['company'];?></td>
						
						<td><?php echo $ticket['site_company'];?></td>
						<td><?php echo $ticket['position'];?></td>
						
						<td>
						<a href="/admin/showlink/edit.php?id=<?php echo $ticket['id'];?>" title="Edit" class="icon-1 info-tooltip"></a>
						
						</td>
						<td>
						
						<a href="/admin/querysets/showlink/delete.php?id=<?php echo $ticket['id'];?>" title="delete" class="icon-2 info-tooltip"></a>
						</td>
					</tr>
				<?php } ?>
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			
			<!-- end actions-box........... -->
			
			<!--  start paging..................................................... -->
			
			<!--  end paging................ -->
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
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