<!DOCTYPE html>
<html lang="ru">

<head>
<meta charset="utf-8">
<title>Register - 11 ECR Forum</title>
<meta name="viewport" content="width=device-width, initial-scale=0">

<link href="font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="../scripts/jquery-ui-1.11.2/jquery-ui.min.css" rel="stylesheet" />
<link href="../animate.min.css" rel="stylesheet" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../jquery.countdown.css">
<link href="/forms.css" rel="stylesheet" type="text/css" />



</head>

<body>

<div class="page">
    <!-- menu -->
    <div class="menu">

      <ul>
        
        <li><a href="index.php#top">home</a></li>
        <li><a href="programm.html">program</a></li>
        <li><a href="speakers.php">speakers</a></li>
        <!-- li><a href="sponsors.html">спонсоры</a></li -->
        <li><a href="award.php">ECR Award</a></li>
        <li><a href="registr.php">registration</a></li>
        <li><a href="index.php#location">contacts</a></li>
        <li class="langru"><a href="/registr.php"><img src="../images/ru.png"></a></li>
        <li class="langen"><a href="/en/registr.php"><img src="../images/en.png"></a></li>
      </ul>
    </div>
    <!-- menu ends! -->

  <!-- header -->  
  <div class="header en header-s main" >

    <!-- header container -->
    <div class="container">
      <img src="../images/clock_eng.png" width="40%" style="float: right; margin-top: -50px; margin-right: -50px;">
      <!-- register -->
      <div class="register-now">
        <a href="registr.php" class="button">Register now!</a>
      </div>
      <!-- register ends! -->
    </div>
  </div>
  <!-- header ends! -->

    <!-- registration -->
  <div class="registration">
    <div class="container">
<?php $pagecode = 'registr'; ?>
  <?php  require $_SERVER['DOCUMENT_ROOT'].'/admin/querysets/content/bycode.php'; ?>    
      
    
    
     <h2><?php echo $page['title_en'];?></h2>
      <?php echo $page['text_en'];?>
      <!-- register form -->
      <?php require_once($_SERVER['DOCUMENT_ROOT'].'/include/ww.form.registr.en.php'); ?>
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
<script src="../scripts/jquery-1.11.0.min.js"></script>
<script src="../scripts/jquery-ui-1.11.2/jquery-ui.min.js"></script>
<script src="../scripts/flexslider/jquery.flexslider-min.js"></script>
<script src="../scripts/jquery.parallax-1.1.3.js"></script>
<script src="../scripts/jquery.inview.min.js"></script>
<script src="../scripts/form.js"></script>
<script src="../scripts/theme.js"></script>
<script src="../jquery.plugin.js"></script>
<script src="../jquery.countdown.js"></script>
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