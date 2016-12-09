CREATE DATABASE  IF NOT EXISTS `english`;
USE `english`;

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `commented_by` int(11) NOT NULL,
  `commented_to` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
