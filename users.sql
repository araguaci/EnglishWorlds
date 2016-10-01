CREATE TABLE  IF NOT EXISTS `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NOT NULL,
  `password` VARCHAR(32) NOT NULL,
  `sign_up_date` DATE NOT NULL,
  `activated` ENUM('0', '1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
