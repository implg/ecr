<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Администрирование</title>
<link rel="stylesheet" href="/admin/css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="/admin/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
 
<!--  checkbox styling script -->
<script src="/admin/js/jquery/ui.core.js" type="text/javascript"></script>
<script src="/admin/js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="/admin/js/jquery/jquery.bind.js" type="text/javascript"></script>
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea:not(.noed)', plugins:  "code", height: 500});</script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>  


<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="/admin/js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>


<!--  styled select box script version 2 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script src="js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
$(function() {
	$("input.file_1").filestyle({ 
	image: "images/forms/upload_file.gif",
	imageheight : 29,
	imagewidth : 78,
	width : 300
	});
});
</script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 

<!--  date picker script -->
<link rel="stylesheet" href="css/datePicker.css" type="text/css" />
<script src="js/jquery/date.js" type="text/javascript"></script>
<script src="js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body> 
<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
	<a href="/admin/"><h1 style="color:#FFF; margin-left:10px;">ECR Forum Admin</h1></a>
	</div>
	<!-- end logo -->
	
	<div id="top-search">
	<?php if ($show_search): ?>
		<form action="/admin/index.php" method="get">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td><input placeholder="Фамилия" name="search_last_name" type="text" value="<?php echo $_REQUEST['search_last_name'];?>"  class="top-search-inp" /></td>
		<td><input placeholder="Компания" name="search_company" type="text" value="<?php echo $_REQUEST['search_company'];?>"  class="top-search-inp" /></td>
		<td>
		 	<label style="color:#fff; font-size:12px; margin-right:5px;"><input <?php if ($_REQUEST['search_company_in_forum']):?>checked<?php endif;?>  type="checkbox" name="search_company_in_forum"> ECR </label>
		 	
		</td>
		<td>
			<label style="color:#fff; font-size:12px; margin-right:5px;"><input <?php if ($_REQUEST['search_no_company_in_forum']):?>checked<?php endif;?>  type="checkbox" name="search_no_company_in_forum"> Не ECR </label>
		</td>
		<td>
			<select name="search_status">
				<option value="">Статус</option>
				<option <?php if ($_REQUEST['search_status'] == 'Registered'):?>selected<?php endif;?> value="Registered">Registered</option>
				<option <?php if ($_REQUEST['search_status'] == 'Participant'):?>selected<?php endif;?> value="Participant">Participant</option>
				<option <?php if ($_REQUEST['search_status'] == 'Ticket'):?>selected<?php endif;?> value="Ticket">Ticket</option>
			</select>
		</td>
		<td>
		<input type="image" src="/admin/images/shared/top_search_btn.gif" style="margin-left:5px;"  />
		</td>
		</tr>
		</table>
		</form>
	<?php endif; ?>
		
	</div>
 	<!--  end top-search -->
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
 <div class="clear"></div>
 <div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 



<div class="nav">
		<div class="table">
		
		<ul class="select"><li><a href="/admin/"><b>Заявки</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->

		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		                    
		<ul class="select"><li><a href="/admin/content/"><b>Страницы</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub ">
			<ul class="sub">
				<li><a href="/admin/content/">Все страницы</a></li>
				<li class="sub_show"><a href="/admin/content/edit.php">Добавить страницу</a></li>
				
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="/admin/speakers/"><b>Спикеры</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub ">
			<ul class="sub">
				<li><a href="/admin/speakers/">Все спикеры</a></li>
				<li class="sub_show"><a href="/admin/speakers/edit.php">Добавить спикера</a></li>
				
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="/admin/programms/"><b>Программы</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub ">
			<ul class="sub">
				<li><a href="/admin/programms/">Все программы</a></li>
				<li class="sub_show"><a href="/admin/programms/edit.php">Добавить программу</a></li>
				
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="/admin/events/"><b>Расписание</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub ">
			<ul class="sub">
				<li><a href="/admin/events/">Все мероприятия</a></li>
				<li class="sub_show"><a href="/admin/events/edit.php">Добавить мероприятие</a></li>
				
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>


</div>
</div>
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">