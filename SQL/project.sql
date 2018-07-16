-- Adminer 4.4.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `rtsoft` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `rtsoft`;

DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `deadline` datetime NOT NULL,
  `type` enum('time limited','continuous integration') NOT NULL,
  `web_project` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2018-07-15 22:06:36
