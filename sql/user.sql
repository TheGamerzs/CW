CREATE TABLE IF NOT EXISTS `user` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`userID`)
)