<!DOCTYPE html>
<html lang="ru">

<head>
<meta charset="utf-8">
<title>Регистрация - 11-ый Ежегодный ECR форум</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0" />

<link href="font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="scripts/jquery-ui-1.11.2/jquery-ui.min.css" rel="stylesheet" />
<link href="animate.min.css" rel="stylesheet" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="jquery.countdown.css">
<link href="/forms.css" rel="stylesheet" type="text/css" />




</head>

<body>

<div class="page">

  <!-- header -->  <div class="header second" >

    <!-- menu -->
    <div class="menu">

      <ul>
        
        <li><a href="index.html#top">Главная</a></li>
        <li><a href="programm.html">программа</a></li>
        <li><a href="speakers.html">спикеры</a></li>
        <!-- li><a href="sponsors.html">спонсоры</a></li -->
        <li><a href="award.html">ECR Award</a></li>
        <li><a href="registr.php">участие</a></li>
        <li><a href="index.html#location">контакты</a></li>
        <li class="langru"><a href="/registr.php"><img src="images/ru.png"></a></li>
        <li class="langen"><a href="en/registr.php"><img src="images/en.png"></a></li>
      </ul>
    </div>
    <!-- menu ends! -->

    <!-- header container -->
    <div class="container">

    <!-- logo container -->
    <div class="logoforum"><img src="images/ECR-Logo.png"></div>
    <!-- logo ends! -->
      
      <!-- logo or main heading -->
    </div>
  </div>
  <!-- header ends! -->

    <!-- registration -->
  <div class="registration">
    <div class="container">

    
      <h2>Регистрация</h2>
     

    
      
      
      <!-- register form -->
      <?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/ww.form.registr.php'); ?>
  </div>
  <!-- registration ends! -->

 

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
</body>
</html>