-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 10 2013 г., 14:31
-- Версия сервера: 5.5.32
-- Версия PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `restoran`
--
CREATE DATABASE IF NOT EXISTS `restoran` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `restoran`;

DELIMITER $$
--
-- Процедуры
--
CREATE DEFINER=`mavi`@`localhost` PROCEDURE `PR`(datet date)
BEGIN
declare totalval float;
declare id_bludo integer;
declare num_order integer;
declare pr_date date;
declare done integer default 0;
declare c1 cursor for
        select rep.id_blud, count(rep.id_ord) num,rep.date
        from report rep
        where   rep.date=datet
        group by rep.id_blud;
declare continue handler
        for sqlstate '02000'
        set done =1;
open c1;
while done=0 do
        fetch c1 into pr_date,id_bludo,num_order,totalval;

end while;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id_area` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_area` varchar(45) NOT NULL,
  `num_tab` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `area`
--

INSERT INTO `area` (`id_area`, `name_area`, `num_tab`) VALUES
(1, 'non-smoking', 3),
(2, 'VIP', 5),
(3, 'smoking', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_m` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cost` float unsigned NOT NULL,
  `weight` float unsigned NOT NULL,
  `name_blud` varchar(45) NOT NULL,
  PRIMARY KEY (`id_m`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id_m`, `cost`, `weight`, `name_blud`) VALUES
(1, 200, 0.5, 'cezar'),
(2, 300, 0.7, 'lapsha'),
(3, 1000, 0.2, 'krasnaya ikra'),
(4, 2000, 0.2, 'chernay ikra'),
(5, 600, 0.3, 'ciplenok');

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id_or` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `totalvalue` float unsigned NOT NULL,
  `timedata` date NOT NULL,
  `id_work` int(10) unsigned NOT NULL,
  `id_tab` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_or`),
  KEY `id_work` (`id_work`),
  KEY `id_tab` (`id_tab`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id_or`, `totalvalue`, `timedata`, `id_work`, `id_tab`) VALUES
(1, 2000.12, '2013-01-02', 1, 2),
(2, 750, '2013-01-02', 1, 1),
(3, 800, '2013-01-02', 2, 1),
(4, 680.26, '2013-02-01', 3, 1),
(5, 1523.26, '2013-02-02', 1, 1),
(6, 1300, '2013-11-17', 1, 1),
(7, 1300, '2013-11-17', 3, 2),
(8, 1300, '2013-11-17', 3, 2),
(9, 1300, '2013-11-17', 3, 2),
(10, 1300, '2013-11-17', 3, 2),
(11, 900, '2013-11-17', 3, 2),
(12, 900, '2013-11-17', 3, 2),
(13, 900, '2013-11-17', 3, 2),
(14, 700, '2013-11-17', 3, 2),
(15, 700, '2013-11-17', 3, 2),
(16, 700, '2013-11-17', 3, 2),
(17, 0, '2013-11-17', 3, 1),
(18, 0, '2013-11-17', 3, 1),
(19, 0, '2013-11-17', 3, 1),
(20, 0, '2013-11-17', 3, 4),
(21, 0, '2013-11-17', 3, 4),
(22, 0, '2013-11-17', 3, 4),
(23, 1600, '2013-11-17', 3, 3),
(24, 24400, '2013-11-18', 3, 4),
(25, 24400, '2013-11-18', 3, 4),
(26, 24400, '2013-11-18', 3, 4),
(27, 11000, '2013-11-18', 3, 1),
(28, 11000, '2013-11-18', 3, 1),
(29, 11000, '2013-11-18', 3, 1),
(30, 11000, '2013-11-18', 3, 1),
(31, 11000, '2013-11-18', 3, 1),
(32, 50100, '2013-11-19', 3, 5),
(33, 50100, '2013-11-19', 3, 5),
(35, 4000, '2013-11-20', 3, 6),
(36, 4000, '2013-11-20', 3, 6),
(37, 4400, '2013-11-20', 3, 6),
(38, 4400, '2013-11-20', 3, 6),
(39, 4400, '2013-11-20', 3, 6),
(40, 0, '0000-00-00', 3, 1),
(41, 0, '0000-00-00', 3, 1),
(42, 0, '0000-00-00', 3, 1),
(43, 0, '0000-00-00', 3, 1),
(44, 0, '0000-00-00', 3, 1),
(45, 0, '0000-00-00', 3, 1),
(46, 0, '0000-00-00', 3, 1),
(47, 0, '2013-12-07', 3, 3),
(48, 0, '2013-12-07', 3, 3),
(49, 0, '2013-12-07', 3, 3),
(50, 0, '0000-00-00', 1, 1),
(51, 4600, '0000-00-00', 1, 1),
(52, 0, '2013-12-07', 3, 3),
(53, 0, '2013-12-07', 3, 3),
(54, 0, '2013-12-07', 3, 3),
(55, 4600, '0000-00-00', 1, 1),
(56, 4600, '0000-00-00', 1, 1),
(57, 1300, '2013-12-07', 1, 3),
(58, 1300, '2013-12-07', 1, 3),
(59, 1300, '2013-12-07', 1, 3),
(60, 1300, '2013-12-07', 1, 3),
(61, 1300, '2013-12-07', 1, 3),
(62, 1300, '2013-12-07', 1, 3),
(63, 1300, '2013-12-07', 1, 3),
(64, 1300, '2013-12-07', 1, 3),
(65, 1300, '2013-12-07', 1, 3),
(66, 1300, '2013-12-07', 1, 3),
(67, 1300, '2013-12-07', 1, 3),
(68, 1300, '2013-12-07', 1, 3),
(69, 1300, '2013-12-07', 1, 3),
(70, 1300, '2013-12-07', 1, 3),
(71, 1300, '2013-12-07', 1, 3),
(72, 1300, '2013-12-07', 1, 3),
(73, 1300, '2013-12-07', 1, 3),
(74, 1300, '2013-12-07', 1, 3),
(75, 1300, '2013-12-07', 1, 3),
(76, 1300, '2013-12-07', 1, 3),
(77, 1300, '2013-12-07', 1, 3),
(78, 1300, '2013-12-07', 1, 3),
(79, 1300, '2013-12-07', 1, 3),
(80, 1300, '2013-12-07', 1, 3),
(81, 1300, '2013-12-07', 1, 3),
(82, 1300, '2013-12-07', 1, 3),
(83, 1300, '2013-12-07', 1, 3),
(84, 1300, '2013-12-07', 1, 3),
(85, 1300, '2013-12-07', 1, 3),
(86, 1300, '2013-12-07', 1, 3),
(87, 1300, '2013-12-07', 1, 3),
(88, 1300, '2013-12-07', 1, 3),
(89, 1300, '2013-12-07', 1, 3),
(90, 1300, '2013-12-07', 1, 3),
(91, 1300, '2013-12-07', 1, 3),
(92, 1300, '2013-12-07', 1, 3),
(93, 1300, '2013-12-07', 1, 3),
(94, 1300, '2013-12-07', 1, 3),
(95, 1300, '2013-12-07', 1, 3),
(96, 1300, '2013-12-07', 1, 3),
(97, 1300, '2013-12-07', 1, 3),
(98, 1300, '2013-12-07', 1, 3),
(99, 1300, '2013-12-07', 1, 3),
(100, 1300, '2013-12-07', 1, 3),
(101, 1300, '2013-12-07', 1, 3),
(102, 1300, '2013-12-07', 1, 3),
(103, 1300, '2013-12-07', 1, 3),
(104, 1300, '2013-12-07', 1, 3),
(105, 1300, '2013-12-07', 1, 3),
(106, 1300, '2013-12-07', 1, 3),
(107, 1300, '2013-12-07', 1, 3),
(108, 1300, '2013-12-07', 1, 3),
(109, 1300, '2013-12-07', 1, 3),
(110, 1300, '2013-12-07', 1, 3),
(111, 32000, '2013-12-07', 1, 6),
(112, 32000, '2013-12-07', 1, 6),
(113, 32000, '2013-12-07', 1, 6),
(114, 32000, '2013-12-07', 1, 6),
(115, 32000, '2013-12-07', 1, 6),
(116, 32000, '2013-12-07', 1, 6),
(117, 32000, '2013-12-07', 1, 6),
(118, 32000, '2013-12-07', 1, 6),
(119, 32000, '2013-12-07', 1, 6),
(120, 8300, '0000-00-00', 1, 1),
(121, 0, '0000-00-00', 1, 1),
(122, 800, '2013-12-07', 1, 1),
(123, 7300, '0000-00-00', 1, 1),
(124, 72000, '2013-12-10', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orderline`
--

CREATE TABLE IF NOT EXISTS `orderline` (
  `id_ordline` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weight` float NOT NULL,
  `cost` float NOT NULL,
  `id_or` int(10) unsigned NOT NULL,
  `id_m` int(10) unsigned NOT NULL,
  `made` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_ordline`),
  KEY `id_or` (`id_or`),
  KEY `id_m` (`id_m`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=410 ;

--
-- Дамп данных таблицы `orderline`
--

INSERT INTO `orderline` (`id_ordline`, `weight`, `cost`, `id_or`, `id_m`, `made`) VALUES
(1, 0.4, 1000, 1, 1, 0),
(2, 0.8, 500, 1, 2, 0),
(3, 1, 5000, 2, 3, 1),
(4, 0.4, 4000, 3, 1, 1),
(5, 0.5, 350, 2, 3, 0),
(6, 0.5, 700.32, 1, 3, 0),
(7, 3, 1000, 2, 3, 1),
(65, 1, 200, 32, 1, 0),
(66, 2, 600, 32, 2, 0),
(67, 3, 3000, 32, 3, 0),
(68, 4, 8000, 32, 4, 0),
(69, 5, 3000, 32, 5, 1),
(70, 6, 1200, 32, 1, 0),
(71, 7, 2100, 32, 2, 0),
(72, 8, 8000, 32, 3, 0),
(73, 9, 18000, 32, 4, 0),
(74, 10, 6000, 32, 5, 1),
(75, 1, 200, 33, 1, 0),
(76, 2, 600, 33, 2, 0),
(77, 3, 3000, 33, 3, 0),
(78, 4, 8000, 33, 4, 0),
(79, 5, 3000, 33, 5, 1),
(80, 6, 1200, 33, 1, 0),
(81, 7, 2100, 33, 2, 0),
(82, 8, 8000, 33, 3, 0),
(83, 9, 18000, 33, 4, 1),
(402, 2, 600, 123, 2, 0),
(403, 3, 1800, 123, 5, 0),
(404, 4, 4000, 123, 3, 0),
(405, 1, 300, 123, 2, 0),
(406, 3, 600, 123, 1, 0),
(407, 3, 3000, 124, 3, 0),
(408, 34, 68000, 124, 4, 0),
(409, 1, 1000, 124, 3, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `id_rep` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `totalvalue` float unsigned NOT NULL,
  `num_blud` int(10) unsigned NOT NULL,
  `id_blud` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `id_ord` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_rep`),
  KEY `id_ord` (`id_ord`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `report`
--

INSERT INTO `report` (`id_rep`, `totalvalue`, `num_blud`, `id_blud`, `date`, `id_ord`) VALUES
(1, 200.23, 1, 1, '2013-02-01', 1),
(2, 2000, 3, 2, '2013-02-01', 1),
(3, 2063.78, 2, 3, '2013-02-02', 2),
(4, 5400.36, 1, 3, '2013-02-02', 3),
(5, 2500, 2, 2, '2013-03-01', 2),
(6, 3000, 2, 2, '2012-03-01', 2),
(7, 2333, 1, 2, '2013-03-01', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `table`
--

CREATE TABLE IF NOT EXISTS `table` (
  `id_tab` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment` varchar(100) DEFAULT NULL,
  `id_area` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_tab`),
  KEY `id_area` (`id_area`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `table`
--

INSERT INTO `table` (`id_tab`, `comment`, `id_area`) VALUES
(1, 'comment', 1),
(2, 'comment', 2),
(3, 'comment', 2),
(4, 'comment', 1),
(5, 'comment', 3),
(6, 'comment', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `worker`
--

CREATE TABLE IF NOT EXISTS `worker` (
  `id_work` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `last_name` varchar(45) CHARACTER SET latin1 NOT NULL,
  `pwd` varchar(45) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '2',
  `birthday` date NOT NULL,
  `adress` varchar(45) CHARACTER SET latin1 NOT NULL,
  `date_admis` varchar(45) CHARACTER SET latin1 NOT NULL,
  `post` varchar(45) CHARACTER SET latin1 NOT NULL,
  `fire_data` date DEFAULT NULL,
  `pay` float unsigned NOT NULL,
  `date_inst_pay` date NOT NULL,
  PRIMARY KEY (`id_work`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `worker`
--

INSERT INTO `worker` (`id_work`, `last_name`, `pwd`, `type`, `birthday`, `adress`, `date_admis`, `post`, `fire_data`, `pay`, `date_inst_pay`) VALUES
(1, 'Koshkin', '222qwe', 2, '1994-09-03', 'Komsomolskaya 3', '2013-12-05', 'oficiant', '0000-00-00', 15000, '2013-01-01'),
(2, 'Kurov', '222qwe', 2, '1993-02-12', 'Perevedenskii 4', '13.01.01', 'oficiant', NULL, 15000, '2013-01-01'),
(3, 'Suppes', '111qwe', 1, '1993-12-08', 'Bakuninskaya', '13.01.01', 'director', NULL, 60000, '2013-01-01');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `id_tab` FOREIGN KEY (`id_tab`) REFERENCES `table` (`id_tab`),
  ADD CONSTRAINT `id_work` FOREIGN KEY (`id_work`) REFERENCES `worker` (`id_work`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orderline`
--
ALTER TABLE `orderline`
  ADD CONSTRAINT `id_m` FOREIGN KEY (`id_m`) REFERENCES `menu` (`id_m`),
  ADD CONSTRAINT `id_or` FOREIGN KEY (`id_or`) REFERENCES `order` (`id_or`);

--
-- Ограничения внешнего ключа таблицы `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `id_ord` FOREIGN KEY (`id_ord`) REFERENCES `order` (`id_or`);

--
-- Ограничения внешнего ключа таблицы `table`
--
ALTER TABLE `table`
  ADD CONSTRAINT `id_area` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
