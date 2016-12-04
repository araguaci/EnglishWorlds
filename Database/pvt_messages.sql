CREATE DATABASE  IF NOT EXISTS `english`;
USE `english`;

DROP TABLE IF EXISTS `pvt_messages`;

CREATE TABLE `pvt_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_from` varchar(45) NOT NULL,
  `user_to` varchar(45) NOT NULL,
  `msg_title` varchar(255) NOT NULL,
  `msg_body` text NOT NULL,
  `date` date NOT NULL,
  `opened` enum('yes','no') NOT NULL,
  `Deleted` enum('yes','no') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
