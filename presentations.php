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
        <li class="langru"><a href="/"><img src="images/ru.png"></a></li>
        <li class="langen"><a href="/en/"><img src="images/en.png"></a></li>
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
<!-- scripts ends! -->

<script>
$(function () {
	var austDay = new Date();
	austDay = new Date(austDay.getFullYear(2015) + 0, 6 - 1, 2,10);
	$('#defaultCountdown').countdown({until: austDay, format: 'dHM'});
});
</script>
</body>
</html>