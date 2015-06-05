<!DOCTYPE html>
<html lang="ru">

<head>
<?php $pagecode = 'main'; ?>
  <?php  require $_SERVER['DOCUMENT_ROOT'].'/admin/querysets/content/bycode.php'; ?>
<meta charset="utf-8">
<title>11 ECR Forum</title>

<meta name="keywords" content="<?php echo $page['meta_keywords_en']; ?>" />
<meta name="description" content="<?php echo $page['meta_description_en']; ?>" />
<meta name="viewport" content="width=device-width, initial-scale=0">

<link href="font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="../scripts/jquery-ui-1.11.2/jquery-ui.min.css" rel="stylesheet" />
<link href="../animate.min.css" rel="stylesheet" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../jquery.countdown.css">
<link rel="stylesheet" type="text/css" href="../slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="../slick/slick-theme.css"/>

<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script>
  function initialize() {
    var myLatlng = new google.maps.LatLng(55.733177, 37.646731);
    var map_options = {
      zoom: 16,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      center: myLatlng,
      scrollwheel: false,
      disableDefaultUI: true
    }

    var map = new google.maps.Map(document.getElementById('map_canvas'), map_options)
    var myIcon = new google.maps.MarkerImage('../images/map_icon.png', null, null, null, new google.maps.Size(36,54));

    var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      icon: myIcon
    });

    /* Remove if you dont want B/W Google Map */
    /*
    var styles = [
      {
        featureType: "all",
        stylers: [
          { saturation: -100 }
        ]
      }
    ];

    map.setOptions({styles: styles});
    */
  }

  google.maps.event.addDomListener(window, 'load', initialize);
</script>
<!-- Google Map Ends! -->

</head>

<body>

<div class="page"> 
  <!-- menu -->
    <div class="menu">

      <ul>
        
        <li><a href="index.php#top">home</a></li>
        <li><a href="programm.php">program</a></li>
        <li><a href="speakers.php">speakers</a></li>
        <!-- li><a href="sponsors.html">спонсоры</a></li -->
        <li><a href="award.php">ECR Award</a></li>
        <!-- li><a href="registr.php">registration</a></li -->
        <li><a href="index.php#location">contacts</a></li>
        <li class="langru"><a href="/"><img src="../images/ru.png"></a></li>
        <li class="langen"><a href="/en/"><img src="../images/en.png"></a></li>
      </ul>
    </div>
    <!-- menu ends! -->

  <!-- header -->
  <div class="header main en">

    <!-- header container -->
    <div class="container">
      <img src="../images/clock_eng.png" width="40%" style="float: right; margin-top: -50px; margin-right: -50px;">

    <!-- logo container -->
    <!-- <div class="logoforum"><img src="../images/ECR-Logo.png"></div> -->
    <!-- logo ends! -->
      
      <!-- logo or main heading -->
      <!--h1><a href="/">ECR FORUM 2015</a></h1-->
      <!-- logo or main heading ends! -->

      <!-- subtitle -->
      <!--p class="subtitle">50+ best experts, <strong><a href="registr.php">1200+ participants</a></strong></p-->
      <!-- subtitle ends! -->

      <!-- when -->
      <!--div class="when">

        <div class="icon-holder">
          <i class="fa fa-calendar"></i>
        </div>

        <div>
          <p><strong>When:</strong></p>
          <p><span>June 2-3, 2015</span><br />At 10:00</p>
          
        </div>

      </div-->
      <!-- when ends!-->

      <!-- where -->
      <!--div class="where">

        <div class="icon-holder">
          <i class="fa fa-map-marker"></i>
        </div>

        <div>
          <p><strong>Where:</strong></p>
          <p><span>Moscow</span><br /><a href="http://www.wtcmoscow.ru/contacts/plan.aspx" target="_blank">World Trade Center</a></p>
        </div>

      </div-->
      <!-- where ends! -->

      <!-- register -->
      <div class="register-now">
<p><!-- a href="http://ecr-all.org/ecrforum2014/program_Rus_files/ECR_program_booklet_final_light.pdf" target="_blank">10й ECR ФОРУМ - PDF буклет >></a --></p>
        

        
        <a href="registr.php" class="button">Register now!</a>
      </div>
      <!-- register ends! -->

    </div>
    <!-- header container ends! -->

  </div>
  <!-- header ends! -->
 
  <div class="topics">
    <div class="container" style="padding-bottom:0px">

      <img src="../images/ECR-Logo-forum.png" style="float:left; margin-right:10px;"><h3><?php echo $page['title_en']; ?></h3>

      <?php echo $page['text_en']; ?>
<br clear="all">
<a id="sopred" class="anchor"></a>
<div id="mytop">
      <!-- single topic -->
      <?php  require $_SERVER['DOCUMENT_ROOT'].'/admin/querysets/speakers/main.php'; ?>
<?php foreach ($speakers as $item): ?>
      <!-- single topic -->
      <div class="my">
        <i class="fa"><img src="<?php echo $item['photo']; ?>" alt="<?php echo $item['name_en'];?>" /></i>
        <h4><?php echo  $item['name_en'];?></h4>
        <cite><span><?php echo $item['position_en']; ?></span></cite>
        <p>
        <?php echo $item['interview_en']; ?>
        </p>
      </div>
      <!-- single topic ends! -->
<?php endforeach; ?>

</div>
    </div>


    <div class="container">
      <h2>Sponsors</h2>


      <!-- testimonials -->
        <div class="testimonials">

          

          <div class="slides">

            <div><a href="#"><img src="../images/metro.jpg" /></a></div>
            <div><a href="#"><img src="../images/pepsico.jpg" /></a></div>
            <div><a href="#"><img src="../images/giageo.png" /></a></div>
            <div><a href="#"><img src="../images/contur.jpg" /></a></div>
			<div><a href="#"><img src="../images/sfera.jpg" /></a></div>
			<div><a href="#"><img src="../images/comarch.jpg" /></a></div>
			<div><a href="#"><img src="../images/iri.jpg" /></a></div>
			<div><a href="#"><img src="../images/gg.jpg" /></a></div>
			<div><a href="#"><img src="../images/ow.jpg" /></a></div>

          </div>

        </div>
        <!-- testimonials ends! -->
    </div>
  </div>
  <!-- topics ends! -->
        
        
  <a id="sponsors" class="anchor"></a>

 <!-- why -->
  <div class="why" style="display:none;">
    <div class="container">

      <!-- testimonials -->
        <div class="testimonials">

          <h4>Sponsors & Partners</h4>

          <div class="slides">

            <blockquote>
              <a href="http://www.metro-cc.ru/"><img src="../images/metro.jpg" /></a><br clear="all">
               
               <p><strong>METRO Cash & Carry</strong> представлена в 29 странах более 700 центрами мелкооптовой торговли. В 2012 году объем продаж компании достиг около 32 миллиарда евро. Численность сотрудников превысила 120 000 человек по всему миру. METRO Cash & Carry – торговое подразделение METRO GROUP, одной из крупнейших и наиболее интернациональных торговых компаний мира. </p>
               <p>В 2012 году объем продаж <strong>METRO GROUP</strong> составил около 67 миллиардов евро. Численность сотрудников на данный момент – более 280 000 человек. </p>
               <p><strong>METRO GROUP</strong> представлена около 2 200 торговыми центрами в 32 странах мира.</p>
<cite><span>Более подробная информация: www.metro-cc.ru, www.metrogroup.de</span></cite>
.
            </blockquote>

            <blockquote>
              <a href="http://www.diageo.com/"><img src="../images/giageo.png" /></a>
            </blockquote>
            
            <blockquote>
              <a href="http://pepsico.ru/"><img src="../images/pepsico.jpg" /></a><br clear="all">
<p><strong>Компания PepsiCo</strong> – один из мировых лидеров на рынке продуктов питания и напитков с годовым объемом продаж более 65 млрд. долларов США. Компания выпускает широкий ассортимент продукции, включая 22 бренда, ежегодные розничные продажи каждого из которых превышают 1 млрд. долларов.</p>

<p><strong>PepsiCo</strong> – крупнейший в России производитель продуктов питания и напитков. Инвестиции PepsiCo в экономику России составляют более 9 млрд. долларов. В России компания представлена более чем 30 предприятиями и 25 тыс. сотрудников. В 2011 году в «семью» PepsiCo вошла основанная в 1992 году компания «Вимм-Билль-Данн», занимавшая лидирующие позиции на рынке молочных продуктов и напитков в России и СНГ.</p>

<p><strong>PepsiCo</strong> – крупнейший в России промышленный переработчик картофеля и один из крупнейших переработчиков сырого молока. Компания инвестирует значительные средства в реализацию программ по повышению эффективности деятельности поставщиков картофеля и молока, а также по улучшению качества и обеспечению роста поставок сырья.</p>

            </blockquote>


          </div>

        </div>
        <!-- testimonials ends! -->

    </div>
  </div>
  <!-- why ends! -->


  <a id="location" class="anchor"></a>
  <!-- location -->
  <div class="location">
    <div class="container">

      <h2>Contacts</h2>
      <p class="subtitle"></p>

      <!-- info -->
      <div class="info">

        <div class="maps">


          <!-- do not remove, needed for Google Map -->
          <div id="map_canvas"></div>
          <!-- do not remove ends! -->

        </div>

        <div class="address">

          <h4>Contacts</h4>

          <!-- <h5><i class="fa fa-chevron-right"></i> Coordinator</h5>

          <div class="venue">
            <p><span>Elena Tkachenko</span></p>
            <p>Coordinator  Enabling Technologies  Expert Council  "Electronic documents  -  efficient economy”</p>
            <p>+7 (903) 964 91 84</p>
             <a>elena.tkachenko@ecr-rus.ru</a>
          </div> -->


          <h5><i class="fa fa-chevron-right"></i> THE EVENT VENUE</h5>

          <p>
The Moscow International Performing Arts Centre<br>
Moscow, 52/8, Kosmodamianskaya emb.<br>
Tel.:       +7 (495) 735 4378<br>
E-mail: <a>office.ecr@gmail.com</a><br>
<a href="http://www.ecr-all.org/russia" target="_blank">www.ecr-all.org/russia</a><br>
</p>

        </div>

      </div>
      <!-- info ends! -->
    
    </div>
  </div>
  <!-- location ends! -->

  <!-- social -->
  <div class="social">
    <div class="container">

    </div>
  </div>
  <!-- social ends! -->

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

<!-- contact form overlay popup -->
<div class="overlay" style="display: none;">

  <div class="contact-form">
    
    <h3>Contact</h3>
    <p>Мы ответим в течение суток</p>

    <!-- contact form -->
    <div class="form">
      <form action="contact.php" method="post">
        <input type="text" name="name" placeholder="Name"/>
        <input type="text" name="email" placeholder="Email"/>
        <textarea name="message" placeholder="Message"></textarea>
        <button name="submit" type="submit">Отправить</button>

      </form>
    </div>
    <!-- contact form ends! -->

    <!-- Do Not Remove! -->
    <p class="error"></p>
    <p class="message"></p>
    <!-- Do Not Remove! Ends! -->

    <a href="#" class="close-contact-form"><i class="fa fa-times fa-lg"></i></a>
  </div>

</div>
<!-- contact form overlay popup ends! -->

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
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="../slick/slick.min.js"></script>

<!-- scripts ends! -->

<script>
$(function () {
	var austDay = new Date();
	austDay = new Date(austDay.getFullYear(2015) + 0, 6 - 1, 2,10);
	$('#defaultCountdown').countdown({until: austDay, format: 'dHM'});
});
</script>
 <script type="text/javascript">
    $(document).ready(function(){
      $('.slides').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
      });
    });
  </script>
</body>
</html>