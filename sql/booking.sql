CREATE TABLE `booking` (
    `bookingID` int NOT NULL AUTO_INCREMENT,
    `start` varchar(25) NOT NULL,
    `end` varchar(25) NOT NULL,
    `pitch` int(2) NOT NULL,
    `userid` int(10) NOT NULL,
    PRIMARY KEY (`bookingID`)
)