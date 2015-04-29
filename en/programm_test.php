<!DOCTYPE html>
<?php 
error_reporting(E_ALL); 
ini_set("display_errors", 1); ?>
<html lang="ru">

<head>
<meta charset="utf-8">
<title>Program - 11 ECR Forum</title>
<meta name="viewport" content="width=device-width, initial-scale=0">

<link href="font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="../scripts/jquery-ui-1.11.2/jquery-ui.min.css" rel="stylesheet" />
<link href="../animate.min.css" rel="stylesheet" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../jquery.countdown.css">

</head>

<body>

<div class="page">

    <!-- menu -->
    <div class="menu">

      <ul>
        
        <li><a href="index.html#top">home</a></li>
        <li><a href="programm.html">program</a></li>
        <li><a href="speakers.html">speakers</a></li>
        <!-- li><a href="sponsors.html">спонсоры</a></li -->
        <li><a href="award.html">ECR Award</a></li>
        <li><a href="registr.php">registration</a></li>
        <li><a href="index.html#location">contacts</a></li>
        <li class="langru"><a href="/programm.html"><img src="../images/ru.png"></a></li>
        <li class="langen"><a href="/en/programm.html"><img src="../images/en.png"></a></li>
      </ul>
    </div>
    <!-- menu ends! -->

  <!-- header -->  
  <div class="header en header-s main" >

    <!-- header container -->
    <div class="container">
      <!-- register -->
      <div class="register-now">
        <a href="registr.php" class="button">Register now!</a>
      </div>
      <!-- register ends! -->
    </div>
  </div>
  <!-- header ends! -->

 <a id="programm" class="anchor"></a>
  <!-- schedule -->
  <?php
  //require $_SERVER['DOCUMENT_ROOT'].'/admin/querysets/events/getevents.php';
  $day = 0;
  $date = '';
  ?>
  <div class="schedule">

    <div class="container">
    <?php foreach($byday as $key=>$day): ?>
    	<?php $day++; ?>

    	<h2>DAY <?php echo $day; ?>. <?php echo date('d.m.Y', strtotime($day[0]['day'])); ?></h2>

      <p class="subtitle"></p>
      <?php if ($day == 2):?>
    		</div>
    		<div class="programm-wrap">
    	<?php elseif($day == 1): ?>
    		<div class="programm-wrap">
    	<?php endif;?>
      <?php foreach ($day as $item): ?>
      	
      
  
        <div class="programm-block programm-parent clearfix">
          <div class="programm-yellow pop-show">
            <span><?php echo $item['time_start']; ?>-<?php echo $item['time_end']; ?></span>
            <div class="programm-text"><?php echo $item['title']; ?></div>
            <div class="pop-block">
              <p></p>
              <div class="pop-desc">
                <?php echo $item['description']; ?>
              </div>
            </div>
          </div>
        </div>
    <?php endforeach; ?>
      
      </div> 
      
      

      </div>

    </div>
  </div>
  <!-- schedule ends! -->

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