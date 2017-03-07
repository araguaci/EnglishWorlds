CREATE DATABASE  IF NOT EXISTS `english`;
USE `english`;

DROP TABLE IF EXISTS `pokes`;

CREATE TABLE `pokes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_from` varchar(40) NOT NULL,
  `user_to` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
