-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 28 2015 г., 22:17
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
-- Структура таблицы `speakers`
--

CREATE TABLE IF NOT EXISTS `speakers` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `speakers`
--

INSERT INTO `speakers` (`id`, `name`, `name_en`, `position`, `position_en`, `photo`, `interview`, `interview_en`, `in_main`) VALUES
(1, 'Питер Бооне', 'Pieter Boone ', 'Со-председатель ECR Russia, Генеральный директор, ', 'ECR Russia Board of Directors Co-Chairman, Chief Executive Officer, Metro Cash&Carry Russia', '/admin/uploads/94ee2c1f663e7b4bed8608954a95121apiter1.jpg', 'Добро пожаловать на 11-ый Ежегодный ECR Форум - площадку, где поставщики и ритейлеры встречаются для формирования взаимной выгоды и удовлетворения потребностей покупателя. Ключевые слова: лучше, быстрее, с большей эффективностью. Такой результат достигается благодаря слаженному партнерскому взаимодействию разных сторон, в котором происходит обмен и обсуждение лучшими практиками.\r\n\r\n', 'Welcome to the 11th Annual ECR Forum – the platform where the Industry and Trade Sector meet with the objective to create sustainable value and relevance for consumers. The Key buzz words are: Better, Faster with more Efficiency as an end result. This is accomplished via a joint collaborative approach between different stakeholders involved, whereby best practices are shared and discussed.\r\n', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
