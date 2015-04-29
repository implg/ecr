-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: forum
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `day` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `description` text NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `description_en` text NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'SHOPPER','2015-06-02','09:30:00','11:00:00','<p><em>Категорийный менеджмент &ndash; сфера сотрудничества или конкуренции? Как совместные усилия добиться роста в категории могут быть эффективно реализованы за счет партнерской КатМан стратегии.</em></p>\r\n<p><strong>Проект по повышению узнаваемости в категории &ldquo;Мороженое&rdquo;<br /></strong>Яна Макарова, Младший категорийный менеджер, <strong>Unilever;<br /></strong>Марина Лисенкова, Старший категорийный менеджер, <strong>Unilever;<br /></strong>Спикер уточняется, <strong>X5 Retail Group.</strong></p>\r\n<p><strong>Совместный проект по развитию категории Кондитерских изделий на основной полке<br /></strong>Дарья Баулина, менеджер по развитию категории, <strong>Mars Шоколад;<br /></strong>Светлана Германова, Заместитель директора департамента операционного маркетинга, <strong>&ldquo;Виктория&rdquo; (ГК &ldquo;Дикси&rdquo;).</strong></p>\r\n<p><strong>Категорийный менеджмент как средство роста категории без дополнительных инвестиций<br /></strong>Наталия Леонова, Аналитик категории, <strong>Coca-&shy;Cola; <br /></strong>Спикер уточняется, <strong>O&rsquo;Key.</strong></p>','SHOPPER','<p><em>Category Management - a field for collaboration or competition? How joint efforts to grow the category can be efficiently realized through collaborative CatMan strategy.</em></p>\r\n<p><strong>Ice Cream Visibility Project</strong> <br /> Yana Makarova, Junior Category Operations Manager, Ice Cream, <strong>Unilever;</strong> <br /> Marina Lisenkova, Senior Category Operations Manager, <strong>Unilever;</strong> <br /> Speaker to be confirmed, <strong>X5 Retail Group.</strong></p>\r\n<p><strong>Joint project in confectionaries category on the main shelf</strong> <br /> Dariya Baulina, Category Manager, <strong>Mars; </strong> <br /> Svetlana Germanova, Deputy Head of Operational Marketing Department, <strong>Victoria (Dixy).</strong></p>\r\n<p><strong>CatMan as a means of category growth without additional investment</strong> <br /> Natalia Leonova, Category Analyst, <strong>Coca-Cola;<br /></strong>Speaker to be confirmed, <strong>O</strong><strong>&rsquo;Key. </strong></p>','programm-blue',NULL),(2,'ЭЛЕКТРОННЫЕ БУХГАЛТЕРСКИЕ ДОКУМЕНТЫ','2015-06-02','09:30:00','11:00:00','<p><em>Внедрение </em><em>электронных бухгалтерских документов: проблемы и их решения, инвестиции и сокращение затрат, вовлечение контрагентов, новые вызовы и изменения законодательства.</em></p>\r\n<p><strong>Опыт внедрения полного цикла ЭДО, включая акты по услугам. Сокращение трудозатрат на 69%.<br /></strong>Артем Захаров, Менеджер IT проектов, <strong>Auchan;<br /></strong>Екатерина Роговская, Менеджер по оптимизации бизнес-процессов, <strong>Nestle.</strong></p>\r\n<p><strong>Поставки товаров и услуг не только с ЭСФ и ТОРГ-&shy;‐12, но и с электронными сопроводительными документами.<br /></strong>Анна Климова, руководитель отдела по соблюдению финансового законодательства РФ, <strong>P&amp;G;<br /></strong>Александр Смирнов, руководитель проектного департамента <strong>&laquo;СКБ Контур&raquo;.</strong></p>\r\n<p><strong>Электронные счета-фактуры и другие бухгалтерские документы.<br /></strong>Юлия Грицина, Руководитель дивизиона по расчету с поставщиками, <strong>Metro Cash&amp;Carry.</strong></p>','E-INVOICES','<p><em>E-source documents implementation:&nbsp; problems and solutions, investments and cost reduction, contractors involvment, new challenges and regulation update.&nbsp; </em></p>\r\n<p><strong>Full cycle implementation of electronic accounting records</strong><strong>. </strong><strong>Labour contribution reduced by 69%</strong> <br /> Artem Zakharov, IT Project Group Manager, <strong>Auchan;</strong> <br /> Ekaterina Rogovskaya, Business Excellence Manager, <strong>Nestle.</strong></p>\r\n<p><strong>The full range of electronic documents for goods and services supply</strong> <br /> Anna Klimova, Local Compliance Organization Leader,<strong> P&amp;G;</strong> <br /> Alexander Smirnov, Head of project department, <strong>SKB Kontur.</strong></p>\r\n<p><strong>E-invoices for e-factoring.</strong><br /> Yulia Gritsyna, Supplier management division manager, <strong>Metro Cash&amp;Carry.</strong></p>','programm-green',NULL),(3,'УПРАВЛЕНИЕ ЦЕПОЧКОЙ ПОСТАВОК','2015-06-02','09:30:00','11:00:00','<p><em>Новый план сотрудничества и формирования доверительной среды для повышения показателя присутствия товара на полке.</em></p>\r\n<p><strong>Совместный проект в области пулинга<br /></strong>Кристоф Менивар, Генеральный Директор, <strong>FM Logistic</strong>;<br />Спикер уточняется, <strong>L`Oreal</strong></p>\r\n<p><strong>Совместное использование автопарка<br /></strong>Иван Канаев, руководитель группы управления и развития клиентского Сервиса, <strong>&ldquo;Балтика&rdquo;</strong>;<br />Спикер уточняется, <strong>X5 Retail Group</strong>.</p>\r\n<p><strong>Транзитные поставки<br /></strong>Александр Калинин, Руководитель проекта EDI, <strong>Coca-Cola</strong>;<br />Спикер уточняется, <strong>Ашан</strong>.</p>','SUPPLY CHAIN','<p><em>The new plan of collaboration and building&nbsp; trust in supply chain aimed at raising on shelf availability.</em></p>\r\n<p><strong>One-Roof Solution (Collaborative project in pooling)</strong> <br /> Kristof Menivar, General Director, <strong>FM Logistic; </strong> <br /> Victor Zhilyaev, KA relations &amp; Project manager, <strong>L`Oreal</strong><strong>.</strong></p>\r\n<p><strong>Sharing track fleet</strong> <br /> Ivan Kanaev, Customer Service Management &amp; Development Group Leader, <strong>Baltika; </strong> <br /> Speaker to be confirmed, <strong>X5 Retail Group.</strong></p>\r\n<p><strong>Transit deliveries<br /></strong>Alexander Kalinin, EDI Project Supervisor, <strong>Coca-Cola;</strong><br /> Speaker to be confirmed, <strong>Auchan.</strong></p>','programm-orange',NULL),(4,'ПРОГРАММЫ ЛОЯЛЬНОСТИ','2015-06-02','11:30:00','13:00:00','<p>Как уйти от ценовой конкуренции, дифференцироваться и сформировать лояльность покупателей? Какие технологии и тактические инструменты позволяют обеспечить максимальную преданность потребителей.&nbsp;</p>','LOYALTY','<p><em>How to get away from price competition, differentiate and create customer loyalty?</em><br /> <em>What technologies and tactical tools allow you to maximize the loyalty of consumers.</em></p>\r\n<p>Speakers to be confirmed</p>','programm-blue',NULL),(5,'ЭЛЕКТРОННЫЕ ДОКУМЕНТЫ ДЛЯ АЛКОГОЛЬНОЙ ПРОДУКЦИИ','2015-06-02','11:30:00','13:00:00','<p>Результаты участия в пилотном проекте ЕГАИС-розница. Опыт партионного учета. Оформление возвратов алкогольной продукции.&nbsp;</p>','ELECTRONIC DOCUMENTS FOR ALCOHOL','<p><em>The results of participation in the pilot project of Unified State Automated Information System for retail (EGAIS-retail). Experience of batch management for alcohol. Making the return of alcoholic beverages.</em></p>\r\n<p>Speakers to be confirmed</p>','programm-green',NULL),(6,'ПРЕДОТВРАЩЕНИЕ ПОТЕРЬ','2015-06-02','11:30:00','13:00:00','<p><em>Новый взгляд на проблему предотвращения потерь. Как компании оценивают и разделяют свои потери и как должны меняться подходы и технологии в ответ на требования бизнеса?&nbsp;</em></p>\r\n<p>Продавайте больше, теряете меньше: новые перспективы по снижению потерь и стоимости без ущерба для роста&nbsp;<br />Стефан Винтер, Партнер,&nbsp;<strong>Oliver Wyman</strong>&nbsp;</p>','SHRINKAGE','<p><em>The next level of loss prevention. How companies consider and measure their losses and how shrinkage management should response to meet business needs.</em></p>\r\n<p>Sell more lose less: A new perspective on reducing shrink and cost without compromising growth<br />Stefan Winter, Partner,&nbsp;<strong>Oliver Wyman</strong></p>','programm-orange',NULL),(7,'ПЛЕНАРНАЯ СЕССИЯ ECR','2015-06-02','14:30:00','16:00:00','<p><em>В чем заключаются основные вызовы и факторы успеха в индустрии и ритейле будущего? </em><br /><em> Примеры лучших практик сотрудничества между поставщиками и ритейлерами. </em><br /><em> Дискуссия первых лиц компаний о перспективах и наиболее приоритетных проектах 2015-2017 гг.</em></p>\r\n<p><strong>Участники</strong> <strong>пленарной</strong> <strong>сессии</strong><strong>:</strong> <br /> Питер Бооне, Со-председатель ECR Russia, Генеральный директор, <strong>\"</strong><strong>МЕТРО</strong> <strong>Кэш</strong> <strong>энд</strong> <strong>Керри</strong> <strong>Россия</strong><strong>\"</strong> <br /> Сильвиу Попович, Со-председатель ECR Russia, Президент, <strong>\"</strong><strong>Пепсико</strong> <strong>Россия</strong><strong>\"</strong> <br /> Маурицио Патарнелло, Генеральный директор, <strong>\"</strong><strong>Нестле</strong> <strong>Россия</strong><strong>\"</strong> <br /> Илья Якубсон, Президент, <strong>\"</strong><strong>ГК</strong> <strong>Дикси&rdquo;</strong> <br /> Ян Дюннинг, Генеральный директор, <strong>\"</strong><strong>Лента</strong><strong>\"</strong> <br /> Валерий Щапов,&nbsp;Генеральный директор сегмента \"Корма для домашних животных\",&nbsp;<strong>&ldquo;Марс</strong><strong>\"</strong><br /> Максимилиан Мусселиус, Исполнительный директор, <strong>ECR Russia</strong></p>','ECR PLENARY','<p><em>What are the main challenges and success factors for the future retail and FMCG industry? </em><br /><em> Best practices of collaboration between suppliers and retailers. </em><br /><em> CEOs discussion panel about perspectives of key projects in 2015 - 2017.</em></p>\r\n<p><strong>Participants:</strong> <br /> Pieter Boone, ECR Russia Board of Directors Co-Chairman, Chief Executive Officer, <strong>Metro Cash&amp;Carry</strong><strong> Russia,</strong> <br /> Silviu Popovici, ECR Russia Board of Directors Co-Chairman, President, <strong>PepsiCo Russia,</strong> <br /> Maurizio Patarnello, Chief Executive Officer, <strong>Nestle Russia,</strong> <br /> Jan Dunning, Chief Executive Officer, <strong>Lenta LLC,</strong> <br /> Ilya Yakubson, President, <strong>Dixy Group,</strong> <br /> Valery Schapov, General Manager, <strong>Mars Petcare,</strong><br /> Maximilian Musselius, Executive director, <strong>ECR</strong></p>','programm-yellow',NULL),(8,'ПЛЕНАРНАЯ СЕССИЯ С УЧАСТИЕМ КОММЕРЧЕСКИХ ДИРЕКТОРОВ','2015-06-02','16:30:00','18:00:00','<p><strong>Основные</strong> <strong>темы</strong> <strong>для</strong> <strong>обсуждения</strong> <strong>в</strong> <strong>ходе</strong> <strong>пленарной</strong> <strong>сессии</strong><strong>:</strong> <br /> &bull; Категорийный менеджмент в России и его эволюция <br /> &bull; Совместное бизнес-планирование <br /> &bull; Вопросы сотрудничества</p>\r\n<p><strong>К</strong> <strong>участию</strong> <strong>в</strong> <strong>сессии</strong> <strong>приглашены</strong><strong>:</strong> <br /> Юрий Леонов, коммерческий директор, <strong>&ldquo;Перекресток&rdquo;</strong><strong>,</strong> <strong>X5 Retail Group</strong><strong>;</strong> <br /> Борис Миниалай, коммерческий директор, <strong>Metro Cash&amp;Carry Russia</strong><strong>;</strong> <br /> Лоран Пруст, коммерческий директор, <strong>Auchan</strong><strong>;</strong> <br /> Андрей Третяк, директор по закупкам, <strong>DIXY</strong><strong>;</strong><br />Герман Тинга, коммерческий директор, <strong>Lenta.</strong></p>\r\n<p><strong>КЛЮЧЕВОЙ</strong> <strong>СПИКЕР</strong><strong>, </strong><strong>МОДЕРАТОР</strong> <strong>ПЛЕНАРНОЙ</strong> <strong>СЕССИИ</strong></p>\r\n<p><strong>Марк</strong> <strong>Тейлор</strong><strong>.</strong><strong>&nbsp;</strong><strong>CEO</strong><strong>, </strong><strong>Taylored</strong> <strong>Development</strong><strong>.</strong><strong>&nbsp;</strong> <br /> Автор бестселлера \"Кто убил Категорийный Менеджмент\" <br /> Марк Тейлор всю свою жизнь работал в области коммерции в FMCG производстве и розничной торговле.</p>\r\n<p>Стратегия развития, переговоры и продажи - вот сферы, в которых специализировался Марк, и не только работал сам, но и проводил обучение для руководства крупнейших глобальных компаний. За время воей карьеры он получил опыт управления оборотами до $ 314 млн. В течение последних десяти лет он провел обучение команд по трейд-маркетингу что в результате дало ежегодный прирост продаж в $100 млн к минимульному целевому показателю и дополнительно $1 млрд к намеченному сроку.&nbsp;</p>','PLENARY SESSION WITH COMMERCIAL DIRECTORS','<p><strong>Topics for discussion:</strong></p>\r\n<ol>\r\n<li>Category Management in Russia and its evolution</li>\r\n<li>Joint Business Planning</li>\r\n<li>Why and where collaboration matters?</li>\r\n</ol>\r\n<p><strong>Speakers invited: </strong> <br /> Yuriy Leonov, Commercial Director, <strong>Perekrestok, X5 Retail Group </strong> <br /> Boris Minialai, Commercial Director, <strong>Metro Cash&amp;Carry Russia</strong> <br /> Andrey Tretyak, Purchasing Director, <strong>DIXY</strong> <br /> Laurent Proust, Commercial Director, <strong>Auchan</strong> <br /> Herman Tinga, Commercial Director, <strong>Lenta</strong> <br /> Vitaliy Valkov, Commercial Director, <strong>Pyaterochka, X5 Retail Group</strong></p>\r\n<p>Maximilian Musselius, Executive director, <strong>ECR</strong></p>\r\n<p><strong>KEY-NOTE SPEAKER AND MODERATOR OF THE SESION:</strong></p>\r\n<p><strong>Mark Taylor. CEO, Taylored Development. </strong></p>\r\n<p>The author of the best-seller &ldquo;Who Killed Category Management&rdquo; <br /> Mark Taylor has spent his life in commercial FMCG roles both in Manufacturing and Retail. <br /> Strategy development, Negotiation and Sales are areas of particular expertise which Mark has not only executed but succesfuly trained to CEO level in some of the largest FMCG companies on the planet. During his career he has managed turnovers up to $314,000,000. <br /> In the last decade he helped trade marketing teams develop skills which have added, conservatively, $100 million P.A. additional benefit to their bottom line and in excess of $1 billion projected to date.</p>','programm-yellow',NULL),(10,'ЛУЧШИЕ ПРАКТИКИ ECR','2015-06-03','09:30:00','11:00:00','<p><em>Ключевые инициативы ECR в действии: Изучение покупателя, Присутствие товара на полке, Синхронизация мастер-&shy;‐данных, Развитие кадров. Лучшие кейсы, представленные наиболее активными участниками рабочих групп и комитетов ECR.</em></p>\r\n<p>В сессии примут участие:</p>\r\n<p>Максимилиан Мусселиус, Исполнительный директор, <strong>ECR Russia</strong>;</p>\r\n<p>Олександр Здрилько, Национальный менеджер по взаимодействию с ключевыми клиентами, <strong>JTI</strong>;</p>\r\n<p>Сергей Серков, Руководитель направления Пиво, Табак, Медиа, <strong>X5 Retail Group</strong>;</p>\r\n<p>Валентина Золотарева, Начальник управления по работе с поставщиками,<strong> &ldquo;Перекресток&rdquo;, &ldquo;Карусель&rdquo;, X5 Retail Group</strong>;</p>\r\n<p>Виктор Жиляев, Менеджер по работе с ключевыми клиентами и проектами, <strong>L`Oreal</strong>;</p>\r\n<p>Анна Ткачева, Category Insight Manager, <strong>Mars</strong>;</p>','ECR BEST PRACTICES','<p><em>The major ECR initatves in acton: Shopper management, On Shelf Availability, Master Data Synchronizaton, E-&shy;invoicing, People development. Best case‐studies presented by leading partcipants of ECR working groups and committees.</em></p>\r\n<p>Speakers invited:</p>\r\n<p>Maximilian Musselius, Executve director, <strong>ECR Russia</strong>;</p>\r\n<p>Olexandr Zdrilko, Natonal Key Account Manager, <strong>JTI</strong>;</p>\r\n<p>Sergey Serkov, Category Director, <strong>X5 Retail Group</strong>;</p>\r\n<p>Valentna Zolotareva, Head of client collaboraton, <strong>&laquo;Perecrestok&raquo;, &laquo;Karousel&raquo;, X5 Retail Group</strong>;</p>\r\n<p>Victor Zhilyaev, KA relatons &amp; Project manager, <strong>L`Oreal</strong>;</p>\r\n<p>Anna Tkacheva, Category Insight Manager, <strong>Mars</strong>.</p>','programm-yellow',NULL),(11,'SHOPPER','2015-06-03','11:30:00','13:00:00','<p><em>Кейсы от ведущих компаниий индустрии. Как покупатели совершают покупки и какие факторы следует принимать во внимание, чтобы&nbsp;повлиять на это решение?</em></p>\r\n<p><strong>Совместный проект в категории &ldquo;Чай&rdquo;<br /></strong>Надежда Короткова, Старший категорийный менеджер, <strong>Unilever</strong>;&nbsp;<br />Анастасия Сиомикова, Младший категорийный менеджер, <strong>Unilever</strong>;&nbsp;<br />Дарья Попенкова, категорийный менеджер, <strong>Selgros</strong>.</p>\r\n<p><strong>Двойной рост продаж в категории &ldquo;Фрэш&rdquo;<br /></strong>Артем Байчоров, Директор Категории, <strong>PepsiCo Russia</strong>;&nbsp;<br />Елена Матвеева, <strong>&ldquo;Перекресток&rdquo;, X5 Retail Group</strong>.</p>\r\n<p><strong>Проект ко-&shy;брендинга<br /></strong>Роман Крылов, Начальник управления сопутствующего бизнеса, <strong>Газпром Нефть</strong>;&nbsp;<br />Андрей Винтер, Директор каналов Современной торговли, <strong>Red Bull Russia</strong>.</p>','SHOPPER','<p><em>The latest shopper insights from the leading companies. How do customers make their shopping and what else should we take into consideraton in fast-&shy;changing environment.</em></p>\r\n<p><strong>Joint Tea Category Management project<br /></strong>Nadezhda Korotkova, Senior Trade Category Manager HPC, Tea &amp; Foods, <strong>Unilever</strong>;<br />Dariya Popenkova, Category Manager, <strong>Selgros</strong>.</p>\r\n<p><strong>Double increase in sales in the category of fresh products<br /></strong>Artem Baichorov, Category Director, <strong>PepsiCo Russia</strong>;<br />Elena Matveeva, <strong>X5 Retail Group (Perekrestok)</strong>.</p>\r\n<p><strong>Cobranding project<br /></strong>Roman Krylov, Head of non&shy;‐fuel Business, <strong>Gazprom Neft</strong>;<br />Andrey Winter, Modern Trade Director, <strong>Red Bull Russia</strong>.</p>','programm-blue',NULL),(12,'EDI','2015-06-03','11:30:00','13:00:00','<p><em>Запуск новых EDI сообщений для улучшений обмена данными с целью оптимизации внутренний и внешних процессов взаимодействия ритейлеров и поставщиков.</em></p>\r\n<p><strong>RECADV: новое рождение<br /></strong>Сергей Козлов, Менеджер по проектам EDI, <strong>&ldquo;Лента&rdquo;</strong>;<br />Иван Канаев, Руководитель группы управления и развития Клиентского Сервиса, <strong>Балтика</strong>.</p>\r\n<p><strong>PRICAT для промо-продукции<br /></strong>Илья Чернов, Руководитель проектов, Дирекция ИТ, <strong>X5 Retail Group</strong>;<br />Артем Даниленко, Системный аналитик, <strong>P&amp;G</strong>.</p>\r\n<p><strong>DESADV -&shy; обновленная спецификация<br /></strong>Вячеслав Поликарпов, Бизнес Партнер по ИТ, <strong>Х5 Retail Group</strong>.</p>','EDI','<p><em>The launch of new electronic messages for improving data interchange, aimed at op4mising internal and external processes of retailers and suppliers.</em></p>\r\n<p><strong> RECADV: the new birth<br /></strong>Sergey Kozlov, EDI Project Manager, <strong>Lenta</strong>;<br />Ivan Kanaev, NKA Customer Service Manager, <strong>Baltika</strong>.</p>\r\n<p><strong>PRICAT for promo products.<br /></strong>Iliya Chernov, Project Manager, IT department, <strong>X5 Retail Group</strong>;<br />Artem Danilenko, Systems analyst, <strong>P&amp;G</strong>.</p>\r\n<p><strong>DESADV -&shy; the updated specificaton.<br /></strong>Vyacheslav Polikarpov, IT Business Partner, <strong>X5 Retail Group</strong>.</p>','programm-green',NULL),(13,'ПРИСУТСТВИЕ ТОВАРА НА ПОЛКЕ','2015-06-03','11:30:00','13:00:00','<p><em>Новые проекты по Доступности товара на полке (OSA) в Росси</em>&nbsp;</p>\r\n<p><strong>Совместное планирование и прогнозирование<br /></strong>Спикер уточняется, <strong>Coca-&shy;Cola</strong>;<br />Спикер уточняется, <strong>X5 Retail Group</strong>.</p>\r\n<p><strong>Проект по улучшению доступности товара на полке<br /></strong>Станислав Герасимов, Менеджер по доступности товара на полке,<strong> P&amp;G</strong>;<br />Спикер уточняется, <strong>&ldquo;Перекресток&rdquo;, X5 Retail Group</strong>.</p>\r\n<p><strong>OSA - &shy;миф или реальность<br /></strong>Иван Канаев, Руководитель группы управления и развития Клиентского Сервиса, <strong>Балтика</strong>;<br />Владимир Чернега, Руководитель отдела анализа и развития, <strong>Дикси Групп</strong>;</p>','ON SHELF AVAILABILITY','<p><em>The new projects in the field of On shelf Availability in Russia. The new plan of collaboration and building trust in supply chain aimed at raising on shelf availability.</em></p>\r\n<p><strong>Joint planning and forecasting<br /></strong>Speaker to be confirmed, <strong>Coca-&shy;Cola</strong>;<br />Speaker to be confirmed, <strong>X5 Retail Group</strong>.</p>\r\n<p><strong>OSA project in P&amp;G<br /></strong>Stanislav Gerasimov, On Shelf Availability&nbsp;(OSA) Unit Manager, <strong>P&amp;G</strong>;<br />Speaker to be confirmed,<strong> X5 Retail Group</strong>.</p>\r\n<p><strong>OSA -&shy; myth or reality<br /></strong>Ivan Kanaev, NKA Customer Service Manager, <strong>Baltika</strong>;<br />Vladimir Chernega, Analytic and development department head, <strong>Dixy Group</strong>.</p>','programm-orange',NULL),(14,'OMNI CHANNEL','2015-06-03','13:30:00','15:00:00','<p><em>Выигрышные стратегии многоканальных продаж, основанные на анализе данных, нацеленные на вовлечение покупателей и рост продаж.</em></p>\r\n<p>Спикеры подтверждаются.</p>','OMNI CHANNEL','<p><em>Winning data-driven omnichannel strategies aimed at engaging shoppers and driving revenue growth.<br /></em></p>\r\n<p>Speakers to be confirmed.</p>','programm-yellow',NULL);
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `company_in_forum` varchar(10) NOT NULL,
  `company` varchar(255) NOT NULL,
  `site_company` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cupon` varchar(255) NOT NULL,
  `count` varchar(255) NOT NULL,
  `bik` varchar(255) NOT NULL,
  `bankname` varchar(255) NOT NULL,
  `ks` varchar(255) NOT NULL,
  `rs` varchar(255) NOT NULL,
  `urname` varchar(255) NOT NULL,
  `who` varchar(255) NOT NULL,
  `sess` varchar(255) NOT NULL,
  `translate` tinyint(1) NOT NULL,
  `member` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Registered',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (103,'Petr','Petrov','on','','olabs','Русский','QA','380961234567','olabstester@mail.ru','12345','1','','','','','','a:4:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";}','a:11:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";i:8;s:1:\"9\";i:9;s:2:\"10\";i:10;s:2:\"11\";}',1,'1','Registered'),(121,'Ivan','Ivanov','1','','','Русский','direcotr','89039649184','elena.tkachenko@ecr-rus.ru','','','','','','','','','a:1:{i:0;s:1:\"9\";}',0,'17','Ticket'),(122,'Petr','Petrov','on','','olabs','Русский','QA','380961234567','olabstester@mail.ru','12345','1','','','','','','a:4:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";}','a:11:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";i:8;s:1:\"9\";i:9;s:2:\"10\";i:10;s:2:\"11\";}',1,'1','Registered'),(123,'Natalia','Ivanova','0','Hilti','','Русский','director','89039649184','elena.tkachenko@ecr-rus.ru','','','','','','','','','a:1:{i:0;s:2:\"10\";}',1,'1','Ticket');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `text_en` text NOT NULL,
  `meta_keywords_en` text NOT NULL,
  `meta_description_en` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'УВАЖАЕМЫЕ ГОСПОДА! <br> ПРИГЛАШАЕМ ВАС НА 11-Й ЕЖЕГОДНЫЙ ECR–ФОРУМ.','<p>В Форуме примут участие более 1200 делегатов, в том числе представители компаний-членов Некоммерческого Партнерства ECR Russia &ndash; 60 крупнейших компаний, лидирующих в индустрии товаров повседневного спроса и розничной торговле. В программу войдут презентации о лучших достижениях ритейлеров и поставщиков в области совместного сокращения издержек, управления потребительским спросом и повышения эффективности цепочки поставок.</p>\r\n<div class=\"verh\">\r\n<p>Информация о 10-м Ежегодном ECR Форуме (3-4 июня 2014 г.): <a href=\"http://www.youtube.com/watch?v=sN8mzdf7fo4\" target=\"_blank\">Видео</a>, <a href=\"https://www.facebook.com/media/set/?set=a.10154297363455425.1073741836.362165845424&amp;type=3\" target=\"_blank\">Фото</a>, <a href=\"http://ecr-all.org/russia/conferences/Conf.php\" target=\"_blank\">Презентации</a>, <a href=\"http://ecr-all.org/ecrforum2014/program_Rus_files/ECR_program_booklet_final_light.pdf\" target=\"_blank\">Буклет-программа</a>.</p>\r\n</div>','','','<strong>Dear Guests!</strong> <br> We invite you to the 11th annual ECR Forum.','<p>More than 1200 delegates including representatives of ECR Russia Nonprofit Partnership company members &ndash; 60 biggest companies, leaders in FMCG and Retail industry, will take part. The program comprises presentations dedicated to the retailers and manufacturers&rsquo; best achievements in the domain of mutual cost cuts and work with customer demand.</p>\r\n<div class=\"verh\">\r\n<p>You will find all the information about the past events during the 10th ECR Forum in 2014 in <a href=\"http://www.youtube.com/watch?v=sN8mzdf7fo4\" target=\"_blank\">Video</a>, <a href=\"https://www.facebook.com/media/set/?set=a.10154297363455425.1073741836.362165845424&amp;type=3\" target=\"_blank\">Photo</a>, <a href=\"http://ecr-all.org/russia/conferences/Conf.php\" target=\"_blank\">Presentations</a>, <a href=\"http://ecr-all.org/ecrforum2014/program_Rus_files/ECR_program_booklet_final_light.pdf\" target=\"_blank\">PDF pamphlet</a>.</p>\r\n</div>','','','ECR-Logo-forum.png','main');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programms`
--

DROP TABLE IF EXISTS `programms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `programms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `sessions` text NOT NULL,
  `sessions_en` text NOT NULL,
  `description` text NOT NULL,
  `description_en` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programms`
--

LOCK TABLES `programms` WRITE;
/*!40000 ALTER TABLE `programms` DISABLE KEYS */;
INSERT INTO `programms` VALUES (1,'SHOPPER','SHOPPER','<ol>\r\n<li>Shopper Insight</li>\r\n<li>Category Management</li>\r\n<li>Efficient Promotions</li>\r\n<li>Shelf Ready Packaging</li>\r\n</ol>','<ol>\r\n<li>Shopper Insight</li>\r\n<li>Category Management</li>\r\n<li>Efficient Promotions</li>\r\n<li>Shelf Ready Packaging</li>\r\n</ol>','<h4>Кейсы от ведущих компаний индустрии.</h4>\r\n<p><strong>Как покупатели совершают покупки и какие факторы нам следует принимать во внимание, если мы хотим повлиять на это решение?</strong></p>\r\n<ol style=\"margin-top: 10px; list-style: circle;\">\r\n<li>Эффективные проекты по категорийному менеджменту</li>\r\n<li>Результаты внедрения</li>\r\n<li>Shelf Ready Packaging</li>\r\n</ol>','<h4>Cases of the leading companies in the industry.</h4>\r\n<p><strong>How do customers make purchases and which factors shall we consider to influence this decision?</strong></p>\r\n<ol style=\"margin-top: 10px; list-style: circle;\">\r\n<li>Efficient category management projects</li>\r\n<li>Shelf Ready Packaging implementation results</li>\r\n</ol>'),(2,'SUPPLY CHAIN','SUPPLY CHAIN','<ol>\r\n<li>Supply Chain Best Practice</li>\r\n<li>On Shelf Availability</li>\r\n<li>Loss Prevention</li>\r\n</ol>','<ol>\r\n<li>Supply Chain Best Practice</li>\r\n<li>On Shelf Availability</li>\r\n<li>Loss Prevention</li>\r\n</ol>','<ol style=\"list-style:circle;\">\r\n<li>Новые проекты по Доступности товара на полке (OSA) в России!</li>\r\n<li>Обновленный план действий и доверительные отношения в цепочке поставок для обеспечения высоких показателей присутствия товара на полке</li>\r\n<li>Результаты исследования причин возникновения и структуры потерь.</li>\r\n</ol>','<ol style=\"list-style:circle;\">\r\n<li>New projects on On-Shelf Availability (OSA) in Russia!</li>\r\n<li>Renovated action plan and trust-based relations in a supply chain to guarantee OSA high indicators</li>\r\n<li>Research results concerning the reasons of loss emergence and structure</li>\r\n</ol>'),(3,'ENABLING TECHNOLOGIES','ENABLING TECHNOLOGIES','<ol>\r\n<li>Master Data Synchronization</li>\r\n<li>EDI</li>\r\n</ol>','<ol>\r\n<li>Master Data Synchronization</li>\r\n<li>EDI</li>\r\n</ol>','<ol style=\"list-style:circle;\">\r\n<li>Решения в области управления мастер данными, новейшие исследования, построенные на анализе\r\n«больших данных».</li>\r\n<li>Оптимизация процесса торговых сетей и поставщиков, сбора данных для более глубокого анализа поведения покупателя.</li>\r\n<li>Лучшие практики по использованию EDI, когда технология становится выгодной для обеих\r\nсторон.</li>\r\n</ol>','<ol style=\"list-style:circle;\">\r\n<li>Master Data management decisions, brand-new research based on BigData analysis</li>\r\n<li>Optimization of retail chains and suppliers process, data collection for a deeper analysis of customer behavior</li>\r\n<li>EDI implementation best practices when the technology becomes profitable for both parties</li>\r\n</ol>'),(4,'ZERO PAPER','ZERO PAPER','<ol>\r\n<li>Электронные бухгалтерские документы</li>\r\n<li>Без бумаги к 2020 г.</li>\r\n</ol>','<ol>\r\n<li>Non-legible documents</li>\r\n<li>No paper waste in 2020</li>\r\n</ol>','<ol style=\"list-style:circle;\">\r\n<li>Опыт внедрения электронных бухгалтерских документов</li>\r\n<li>Результаты выполнения дорожной карты АСИ</li>\r\n<li>Новые документы в электронном виде</li>\r\n</ol>','<ol style=\"list-style:circle;\">\r\n<li>The experience of accounting records implementation/li&gt;\r\n</li><li>Results of using ASI roadmap</li>\r\n<li>New documents in non-legible form</li>\r\n</ol>');
/*!40000 ALTER TABLE `programms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `speakers`
--

DROP TABLE IF EXISTS `speakers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `speakers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `position_en` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `interview` text NOT NULL,
  `interview_en` text NOT NULL,
  `in_main` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `speakers`
--

LOCK TABLES `speakers` WRITE;
/*!40000 ALTER TABLE `speakers` DISABLE KEYS */;
INSERT INTO `speakers` VALUES (1,'Питер Бооне','Pieter Boone ','Со-председатель ECR Russia, Генеральный директор, ','ECR Russia Board of Directors Co-Chairman, Chief Executive Officer, Metro Cash&Carry Russia','/admin/uploads/94ee2c1f663e7b4bed8608954a95121apiter1.jpg','Добро пожаловать на 11-ый Ежегодный ECR Форум - площадку, где поставщики и ритейлеры встречаются для формирования взаимной выгоды и удовлетворения потребностей покупателя. Ключевые слова: лучше, быстрее, с большей эффективностью. Такой результат достигается благодаря слаженному партнерскому взаимодействию разных сторон, в котором происходит обмен и обсуждение лучшими практиками.\r\n\r\n','Welcome to the 11th Annual ECR Forum – the platform where the Industry and Trade Sector meet with the objective to create sustainable value and relevance for consumers. The Key buzz words are: Better, Faster with more Efficiency as an end result. This is accomplished via a joint collaborative approach between different stakeholders involved, whereby best practices are shared and discussed.\r\n',1);
/*!40000 ALTER TABLE `speakers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-29 11:10:41
