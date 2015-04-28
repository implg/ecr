-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 28 2015 г., 19:18
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `forum`
--

-- --------------------------------------------------------

--
-- Структура таблицы `programms`
--

CREATE TABLE IF NOT EXISTS `programms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `sessions` text NOT NULL,
  `sessions_en` text NOT NULL,
  `description` text NOT NULL,
  `description_en` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `programms`
--

INSERT INTO `programms` (`id`, `title`, `title_en`, `sessions`, `sessions_en`, `description`, `description_en`) VALUES
(1, 'SHOPPER', 'SHOPPER', '<ol>\r\n<li>Shopper Insight</li>\r\n<li>Category Management</li>\r\n<li>Efficient Promotions</li>\r\n<li>Shelf Ready Packaging</li>\r\n</ol>', '<ol>\r\n<li>Shopper Insight</li>\r\n<li>Category Management</li>\r\n<li>Efficient Promotions</li>\r\n<li>Shelf Ready Packaging</li>\r\n</ol>', '              <h4>Кейсы от ведущих компаний индустрии.</h4>\r\n<strong>Как покупатели совершают покупки и какие факторы нам следует принимать во внимание, если мы хотим повлиять на это решение?</strong>\r\n<ol style="margin-top:10px; list-style:circle;">\r\n<li>Эффективные проекты по категорийному менеджменту</li>\r\n<li>Результаты внедрения</li>\r\n<li>Shelf Ready Packaging</li>\r\n</ol>', '              <h4>Cases of the leading companies in the industry.</h4>\r\n<strong>How do customers make purchases and which factors shall we consider to influence this decision?</strong>\r\n<ol style="margin-top:10px; list-style:circle;">\r\n<li>Efficient category management projects</li>\r\n<li>Shelf Ready Packaging implementation results</li>\r\n</ol>\r\n         '),
(2, 'SUPPLY CHAIN', 'SUPPLY CHAIN', '<ol>\r\n<li>Supply Chain Best Practice</li>\r\n<li>On Shelf Availability</li>\r\n<li>Loss Prevention</li>\r\n</ol>', '<ol>\r\n<li>Supply Chain Best Practice</li>\r\n<li>On Shelf Availability</li>\r\n<li>Loss Prevention</li>\r\n</ol>', '<ol style="list-style:circle;">\r\n<li>Новые проекты по Доступности товара на полке (OSA) в России!</li>\r\n<li>Обновленный план действий и доверительные отношения в цепочке поставок для обеспечения высоких показателей присутствия товара на полке</li>\r\n<li>Результаты исследования причин возникновения и структуры потерь.</li>\r\n</ol>', '<ol style="list-style:circle;">\r\n<li>New projects on On-Shelf Availability (OSA) in Russia!</li>\r\n<li>Renovated action plan and trust-based relations in a supply chain to guarantee OSA high indicators</li>\r\n<li>Research results concerning the reasons of loss emergence and structure</li>\r\n</ol>'),
(3, 'ENABLING TECHNOLOGIES', 'ENABLING TECHNOLOGIES', '<ol>\r\n<li>Master Data Synchronization</li>\r\n<li>EDI</li>\r\n</ol>', '<ol>\r\n<li>Master Data Synchronization</li>\r\n<li>EDI</li>\r\n</ol>', '<ol style="list-style:circle;">\r\n<li>Решения в области управления мастер данными, новейшие исследования, построенные на анализе\r\n«больших данных».</li>\r\n<li>Оптимизация процесса торговых сетей и поставщиков, сбора данных для более глубокого анализа поведения покупателя.</li>\r\n<li>Лучшие практики по использованию EDI, когда технология становится выгодной для обеих\r\nсторон.</li>\r\n</ol>', '<ol style="list-style:circle;">\r\n<li>Master Data management decisions, brand-new research based on BigData analysis</li>\r\n<li>Optimization of retail chains and suppliers process, data collection for a deeper analysis of customer behavior</li>\r\n<li>EDI implementation best practices when the technology becomes profitable for both parties</li>\r\n</ol>'),
(4, 'ZERO PAPER', 'ZERO PAPER', '<ol>\r\n<li>Электронные бухгалтерские документы</li>\r\n<li>Без бумаги к 2020 г.</li>\r\n</ol>', '<ol>\r\n<li>Non-legible documents</li>\r\n<li>No paper waste in 2020</li>\r\n</ol>', '<ol style="list-style:circle;">\r\n<li>Опыт внедрения электронных бухгалтерских документов</li>\r\n<li>Результаты выполнения дорожной карты АСИ</li>\r\n<li>Новые документы в электронном виде</li>\r\n</ol>', '<ol style="list-style:circle;">\r\n<li>The experience of accounting records implementation/li&gt;\r\n</li><li>Results of using ASI roadmap</li>\r\n<li>New documents in non-legible form</li>\r\n</ol>');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
