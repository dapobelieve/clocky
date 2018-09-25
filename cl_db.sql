-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin',    '48bb6e862e54f2a795ffc4e541caed4d');

DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `item` text DEFAULT NULL,
  `in` datetime DEFAULT NULL,
  `out` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `logs` (`id`, `name`, `item`, `in`, `out`) VALUES
(1, 'Dapo Michaels',    ' acer 2017 model laptop and wallet',   '2018-03-18 17:30:14',  '2018-03-18 17:30:14'),
(2, 'james patterson',  'bibile amd keys',  '2018-03-18 17:29:46',  '2018-03-18 17:29:46'),
(3, 'enjoy',    'car kyesy',    '2018-03-18 17:31:53',  '2018-03-18 17:32:44'),
(4, 'tope james',   'DELL laptop',  '2018-03-18 17:35:29',  '2018-03-18 17:36:10'),
(5, 'yomi fashlanso',   'cake and cooler',  '2018-03-18 17:36:46',  NULL),
(6, 'yinka',    'perfume',  '2018-03-18 17:37:16',  '2018-03-18 17:41:59');

-- 2018-03-18 16:49:52