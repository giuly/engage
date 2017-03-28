CREATE DATABASE `engage` /*!40100 DEFAULT CHARACTER SET latin1 */;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `birth` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;