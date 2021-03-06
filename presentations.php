<!DOCTYPE html>
<html lang="ru">
    
<?php $pagecode = 'presentation'; ?>
  <?php  require $_SERVER['DOCUMENT_ROOT'].'/admin/querysets/content/bycode.php'; ?>  
<head>
<meta charset="utf-8">
<title>Презентации - 11-ый Ежегодный ECR форум</title>
<meta name="viewport" content="width=device-width, initial-scale=0">
<meta name="keywords" content="<?php echo $page['meta_keywords']; ?>" />
<meta name="description" content="<?php echo $page['meta_description']; ?>" />
<link href="font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="scripts/jquery-ui-1.11.2/jquery-ui.min.css" rel="stylesheet" />
<link href="animate.min.css" rel="stylesheet" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="jquery.countdown.css">
<link rel="stylesheet" href="/scripts/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<link href="/forms.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="page">

    <!-- menu -->
    <div class="menu">

      <ul>
        
        <li><a href="index.php#top">Главная</a></li>
        <li><a href="programm.php">программа</a></li>
        <li><a href="speakers.php">спикеры</a></li>
        <!-- li><a href="sponsors.html">спонсоры</a></li -->
        <li><a href="award.php">ECR Award</a></li>
        <!-- li><a href="registr.php">участие</a></li -->
        <li><a href="index.php#location">контакты</a></li>
        <li class="langru"><a href="/presentations.php"><img src="images/ru.png"></a></li>
        <li class="langen"><a href="/en/presentations.php"><img src="images/en.png"></a></li>
      </ul>
    </div>
    <!-- menu ends! -->

  <!-- header -->  
  <div class="header header-s main" >

    <!-- header container -->
    <div class="container">
      <img src="images/clock_rus.png" width="40%" style="float: right; margin-top: -50px; margin-right: -50px;">

    <!-- logo container -->
    <!-- <div class="logoforum"><img src="images/ECR-Logo.png"></div> -->
    <!-- logo ends! -->
      <!-- register -->
      <div class="register-now">
        <a href="registr.php" class="button">Регистрация</a>
      </div>
      <!-- register ends! -->
      
      <!-- logo or main heading -->
    </div>
  </div>
  <!-- header ends! -->
<a id="award" class="anchor"></a>
  <!-- speakers -->
  <div class="speakers">
    <div class="container">

        <h2><?php echo $page['title']; ?></h2>

        <?php
          if (!$_REQUEST['key'] || $_REQUEST['key'] != md5($_REQUEST['email'].'_ecr_forum_key')){
            //die;
            $replace = "href='#fancybox_form' class='fancybox'";
            $page['text'] = preg_replace('#href=\\"(.*)\\"#', $replace, $page['text']);
          }
        ?>
        <?php echo $page['text']; ?>
        <!-- featured ends! -->

  <!-- speakers ends! -->

 

  <!-- footer -->
  <div class="footer">
    <div class="container">

      <p>Copyright 2014, ECR-Forum.com</p>

    </div>
  </div>
  <!-- footer ends! -->

</div>
<?php  require $_SERVER['DOCUMENT_ROOT'].'/include/ww.form.showlink.php'; ?>
<!-- back to top -->
<div class="back">
  <div class="container">

    <a href="#top"><i class="fa fa-angle-up fa-3x"></i></a>

  </div>
</div>
<!-- back to top ends! -->


<!-- scripts -->
<script src="scripts/jquery-1.11.0.min.js"></script>
<script src="scripts/jquery-ui-1.11.2/jquery-ui.min.js"></script>
<script src="scripts/flexslider/jquery.flexslider-min.js"></script>
<script src="scripts/jquery.parallax-1.1.3.js"></script>
<script src="scripts/jquery.inview.min.js"></script>
<script src="scripts/form.js"></script>
<script src="scripts/theme.js"></script>
<script src="jquery.plugin.js"></script>
<script src="jquery.countdown.js"></script>
<script src="jquery.countdown-ru.js"></script>
<script src="/scripts/spin.min.js"></script>
<script src="/scripts/forms.js"></script>

<!-- scripts ends! -->

<script>
$(function () {
	var austDay = new Date();
	austDay = new Date(austDay.getFullYear(2015) + 0, 6 - 1, 2,10);
	$('#defaultCountdown').countdown({until: austDay, format: 'dHM'});
});
</script>


<script type="text/javascript" src="/scripts/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<script>
$(document).ready(function(){
  $('a.fancybox').on('click', function(){
    $("#fancybox_form, .fancybox_form_bg").show();
  });
  $('.fancybox_form_bg').on('click', function(){
    $("#fancybox_form, .fancybox_form_bg").hide();
  });
});
</script>
</body>

</html>