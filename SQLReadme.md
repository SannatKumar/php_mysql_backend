create database bookingdb;


CREATE TABLE `bookingdb`.`venue` ( `venueId` INT(50) NOT NULL AUTO_INCREMENT , `venueName` VARCHAR(100) NOT NULL , PRIMARY KEY (`venueId`)) ENGINE = InnoDB;

CREATE TABLE `bookingdb`.`meetingroom` ( `meetingRoomId` INT(50) NOT NULL AUTO_INCREMENT , `meetingRoomName` VARCHAR(50) NOT NULL , `venueId` INT(50) NOT NULL , PRIMARY KEY (`meetingRoomId`)) ENGINE = InnoDB;

CREATE TABLE `bookingdb`.`website` ( `websiteId` INT(50) NOT NULL AUTO_INCREMENT , `websiteName` VARCHAR(500) NOT NULL , PRIMARY KEY (`websiteId`)) ENGINE = InnoDB;

CREATE TABLE `bookingdb`.`venuewebsite` ( `venueWebsiteId` INT(50) NOT NULL AUTO_INCREMENT , `venue` VARCHAR(50) NOT NULL , `website` VARCHAR(500) NOT NULL , `isVisible` BOOLEAN NOT NULL , PRIMARY KEY (`venueWebsiteId`)) ENGINE = InnoDB;

CREATE TABLE `bookingdb`.`bookingdata` ( `bookingDataId` INT(50) NOT NULL AUTO_INCREMENT , `venueWebsite` VARCHAR(500) NOT NULL , `room` VARCHAR(50) NOT NULL , `price` DECIMAL(65) NOT NULL , PRIMARY KEY (`bookingDataId`)) ENGINE = InnoDB;

INSERT INTO `venue` (`venueId`, `venueName`) VALUES ('01', 'Radisson'), ('02', 'Yak & Yeti'), ('03', 'Omena');

INSERT INTO `meetingroom` (`meetingRoomId`, `meetingRoomName`, `venueId`) VALUES (NULL, 'Moon', '01'), (NULL, 'Heart', '01');

INSERT INTO `meetingroom` (`meetingRoomId`, `meetingRoomName`, `venueId`) VALUES (NULL, 'Yak', '02'), (NULL, 'Yeti', '02');

INSERT INTO `meetingroom` (`meetingRoomId`, `meetingRoomName`, `venueId`) VALUES (NULL, 'Mango', '03'), (NULL, 'Apple', '03');

INSERT INTO `website` (`websiteId`, `websiteName`) VALUES (NULL, 'www.xyz.com'), (NULL, 'www.ABC.com'), (NULL, 'www.BookingHotel.com');