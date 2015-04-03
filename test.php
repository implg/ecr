<?php
error_reporting(E_ALL); 
ini_set("display_errors", 1);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
<meta charset="utf-8">
<title>11-ый Ежегодный ECR форум</title>

<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0" />

<link href="/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="/scripts/jquery-ui-1.11.2/jquery-ui.min.css" rel="stylesheet" />
<link href="/animate.min.css" rel="stylesheet" />
<link href="/style.css" rel="stylesheet" type="text/css" />
<link href="/forms.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/jquery.countdown.css">

<!-- Google Map -->

<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<script>
  function initialize() {
    var myLatlng = new google.maps.LatLng(55.755828,37.554992);
    var map_options = {
      zoom: 16,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      center: myLatlng,
      scrollwheel: false,
      disableDefaultUI: true
    }

    var map = new google.maps.Map(document.getElementById('map_canvas'), map_options)
    var myIcon = new google.maps.MarkerImage('images/map_icon.png', null, null, null, new google.maps.Size(36,54));

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

  <!-- header -->
  <div class="header">

    <!-- menu -->
    <div class="menu">

      <ul>
        <li><a href="#award">ECR Award</a></li>
        <li><a href="#registration">регистрация</a></li>
        <li><a href="#sponsors">спонсоры</a></li>
        <li><a href="#location">контакты</a></li>
      </ul>

    </div>
    <!-- menu ends! -->

    <!-- header container -->
    <div class="container">

    <!-- logo container -->
    <div class="logoforum"><img src="images/ECR-Logo.png"></div>
    <!-- logo ends! -->
      
      <!-- logo or main heading -->
      <h1><a href="/">ECR ФОРУМ 2015</a></h1>
      <!-- logo or main heading ends! -->

      <!-- subtitle -->
      <p class="subtitle">2 дня, 7 мероприятий, десятки лучших экспертов, <strong><a href="#registration">1200+ участников</a></strong></p>
      <!-- subtitle ends! -->

      <!-- when -->
      <div class="when">

        <div class="icon-holder">
          <i class="fa fa-calendar"></i>
        </div>

        <div>
          <p><strong>Когда</strong></p>
          <p><span>2 - 3 июня 2015</span><br />Начало в 10:00</p>
          
        </div>

      </div>
      <!-- when ends!-->

      <!-- where -->
      <div class="where">

        <div class="icon-holder">
          <i class="fa fa-map-marker"></i>
        </div>

        <div>
          <p><strong>Где</strong></p>
          <p><span>Москва</span><br /><a href="http://www.wtcmoscow.ru/contacts/plan.aspx" target="_blank">Центр Международной Торговли</a></p>
        </div>

      </div>
      <!-- where ends! -->

      <!-- register -->
      <div class="register-now">
<p><a href="http://ecr-all.org/ecrforum2014/program_Rus_files/ECR_program_booklet_final_light.pdf" target="_blank">10й ECR ФОРУМ - PDF буклет >></a></p>
        

        
        <a href="registr.php" class="button">Регистрация</a>
      </div>
      <!-- register ends! -->

    </div>
    <!-- header container ends! -->

  </div>
  <!-- header ends! -->

  <!-- topics -->
  <div class="topics">
    <div class="container">

      <img src="images/ECR-Logo-forum.png" style="float:left; margin-right:10px;"><h3><strong>Уважаемые Господа!</strong><br />Приглашаем вас на 11-й Ежегодный ECR–Форум.</h3>

      <p>В Форуме примут участие более 1200 делегатов, в том числе представители компаний-членов Некоммерческого Партнерства ECR Russia –  60 крупнейших компаний, лидирующих в индустрии товаров повседневного спроса и розничной торговле.</p> <br clear="all">

      <!-- single topic -->
      <div>
        <i class="fa fa-file-pdf-o fa-2x"></i>
        <p>Информация о  мероприятиях, которые проводились в рамках 10-го ECR форума в 2014 году - (<a href="http://ecr-all.org/ecrforum2014/program_Rus_files/ECR_program_booklet_final_light.pdf">PDF буклет</a>).</p>
      </div>
      <!-- single topic ends! -->

      <!-- single topic -->
      <div>
        <i class="fa fa-line-chart fa-2x"></i>
        <p>В программу войдут презентации о лучших достижениях ритейлеров и поставщиков в области совместного сокращения издержек и работе с потребительским спросом.</p>
      </div>
      <!-- single topic ends! -->

      <!-- single topic -->
      <div>
        <i class="fa fa-clock-o fa-2x"></i>
        <p>Наше ежегодное мероприятие состоится 2-3 июня 2015 г в Центре Международной Торговли
(Москва, Краснопресненская наб. 12).</p>
      </div>
      <!-- single topic ends! -->

    </div>
  </div>
  <!-- topics ends! -->

      <!-- testimonials -->
        <div class="testimonials">

          <h4>Обращения сопредседателей</h4>

          <div class="slides">

            <blockquote>
              <img src="images/piter.png" alt="Питер Бооне" /><br />
              За 10 лет партнерство ECR доказало свою эффективность. Объединяя ритейлеров и поставщиков, площадка способствует внедрению лучших практик и выработке общих стандартов. Двигаясь в этом направлении, ECR продолжит быть во главе изменений и инноваций в различных областях стратегии ECR (в частности, в области Управления цепочкой поставок и Управления спросом), оптимизируя вопросы взаимодействия между производителями и компаниями торговли. 
              <cite><strong>Питер Бооне</strong><br /><span>Генеральный директор, МЕТРО Кэш энд Керри Россия, Со-председатель ECR Russia</span></cite>
            </blockquote>

            <blockquote>
            <img src="images/silviu.png" alt="Сильвиу Поповичи" /><br />
            ПепсиКо входит в состав многих профессиональных ассоциаций в России, в том числе в ECR, и хочу отметить, что это одна из наиболее эффективных организаций на российском рынке. ECR объединяет поставщиков и ритейлеров на одной платформе и помогает им налаживать сотрудничество в самых разных сферах - управлении цепочкой поставок, изучении потребительского спроса, EDI. И для поставщиков и для ритейлеров членство в ECR - возможность формировать работу с российским потребителем сегодня и в будущем. Я рекомендую всем компаниям присоединиться к сообществу ECR.
              <cite><strong>Сильвиу Поповичи</strong><br /><span>Генеральный менеджер, PepsiCo Russia, Со-председатель ECR Russia</span></cite>
            </blockquote>

            <blockquote>
              <img src="images/maksimilyan.png" alt="Максимилиан Мусселиус" /><br />
              В ECR есть четыре основных направления работы: 1 - вовлечение покупателя, 2 - сокращение издержек в цепи поставок, 3 - технологическое обеспечение, 4 - развитие персонала. Пятым элементом является доверие между поставщиком и сетью. Без этого “клея” невозможно успешно внедрять совместные практики.  
              <cite><strong>Максимилиан Мусселиус</strong><br /><span>Исполнительный директор ECR Russia</span></cite>
            </blockquote>

          </div>

        </div>
        <!-- testimonials ends! -->
        
        
  <a id="sponsors" class="anchor"></a>

  <!-- sponsors -->
  <div class="sponsors">
    <div class="container">

      <h2>Спонсоры & Партнеры</h2>
      <p class="subtitle">Хотите стать спонсором? <a href="#location">Свяжитесь с нами!</a></p>

      <div class="slides">
        <ul>
          <li><a href="http://www.metro-cc.ru/"><img src="images/metro.jpg" /></a></li>
          <li><a href="http://pepsico.ru/"><img src="images/pepsico.jpg" /></a></li>
          <li><a href="http://www.diageo.com/"><img src="images/giageo.png" /></a></li>
        </ul>
      </div>

    </div>
  </div>
  <!-- sponsors ends! -->



<a id="award" class="anchor"></a>
  <!-- speakers -->
  <div class="speakers">
    <div class="container">

        <h2>ECR Award</h2>
        <p class="subtitle">Стать победителем ECR Award – большая честь для номинантов!</p>
        <!-- featured -->
        <div class="featured">

          <div class="image">
            <img src="images/featured-speaker.jpg" alt="" />
          </div>

          <div>
 <p>ECR Award – ежегодная церемония награждения лучших кейсов индустрии FMCG и ритейла. Самые лучшие в России практики совместной работы соревнуются за звание лучшего кейса в индустрии.</p>
            <h3>Номинации ECR Award:</h3>
<ul>
<li>Лучший кейс в категории изучения покупателей и управления спросом</li>
<li>Лучший кейс в области оптимизации цепи поставок</li>
<li>Лучший кейс в области технологического обеспечения и внедрения электронного документооборота </li>
</ul>

<p>Подать заявку на участие в конкурсе может любая компания.</p>
<p>Победитель выбирается путем широкого online-голосования. Профессионалы индустрии отдают свои голоса лучшим кейсам, а награждение победителей традиционно проходит в рамках вечернего приема Форума ECR.</p>

<p>Хотите получить признание коллег и с гордостью демонстрировать награду победителя ECR Award? Заявляйте свои кейсы на ECR Award 2015, прием заявок открыт по адресу: <a href="mailto:office.ecr@gmail.com">office.ecr@gmail.com</a></p>
          </div>

        </div>
        <!-- featured ends! -->

  <!-- speakers ends! -->
  </div>   </div>

  <!-- schedule -->
 
  <!-- schedule ends! -->

  <!-- why -->

  <!-- why ends! -->

  <a id="registration" class="anchor"></a>

  <!-- registration -->
  <div class="registration">
    <div class="container">

      <h2>Стоимость</h2>
      <p class="subtitle">Для сотрудников компаний-членов <a href="и: http://www.ecr-all.org/russia/members/Members.php" target="_blank">ECR Russia</a> участие бесплатное!</p>
<div class="counter">До начала форума:<br>
<div id="defaultCountdown" class="myhome"></div></div>
      <p class="desc">
      <strong>45 000 рублей</strong> - при регистрации до 1 мая.<br>
      <strong>50 000 рублей</strong> - при регистрации до 1 июня.<br>
      <strong>55 000 рублей</strong> - при регистрации после 1 июня (по гарантийному письму).
      </p>
Внимание! Цены указаны без учета НДС. <br>
При участии 2-х и более делегатов от компании действует скидка в размере 5% 
<br>
По вопросам Делегатского участия обращайтесь к Елене Ткаченко - tel: +7-903-964-91-84, E-mail: elena.tkachenko@ecr-rus.ru 
      <h2>Регистрация</h2>
      <!-- register form -->
      

      <?php include($_SERVER['DOCUMENT_ROOT'].'/include/ww.form.registr.php'); ?>
  </div>
  <!-- registration ends! -->


  <a id="location" class="anchor"></a>

  <!-- location -->
  <div class="location">
    <div class="container">

      <h2>Контакты</h2>
      <p class="subtitle">Центр Международной Торговли на карте</p>

      <!-- info -->
      <div class="info">

        <div class="maps">


          <!-- do not remove, needed for Google Map -->
          <div id="map_canvas"></div>
          <!-- do not remove ends! -->

        </div>

        <div class="address">

          <h4>Контакты</h4>

          <h5><i class="fa fa-chevron-right"></i> Организационные вопросы:</h5>

          <div class="venue">
            <p><span>Elena Tkachenko</span></p>
            <p>Coordinator  Enabling Technologies  Expert Council  "Electronic documents  -  efficient economy”</p>
            <p>+7 (903) 964 91 84</p>
             <a>elena.tkachenko@ecr-rus.ru</a>
          </div>


          <h5><i class="fa fa-chevron-right"></i> Общие вопросы</h5>

          <p>
109028 Москва, ул.Солянка, дом 15/18,стр.4, офис 203<br>
Тел.:       +7 (495) 735 4378<br>
Факс:    +7 (495) 232 4879<br>
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
    
    <h3>Контакт с нами</h3>
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
<script src="scripts/jquery-1.11.1.js"></script>
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