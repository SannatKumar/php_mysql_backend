DROP DATABASE IF EXISTS bookingdb;
CREATE DATABASE bookingdb CHARACTER SET utf8 COLLATE utf8_general_ci;
use bookingdb;

DROP TABLE IF EXISTS venue;
DROP TABLE IF EXISTS website;
DROP TABLE IF EXISTS venuewebsite;
DROP TABLE IF EXISTS meetingroom;
DROP TABLE IF EXISTS bookingdata;

	
CREATE TABLE venue(
	id			INTEGER AUTO_INCREMENT primary key,-- Internal ID, do not modify, primary key
	vname		VARCHAR(40) NOT NULL-- First name of the user
)ENGINE=InnoDB;

CREATE TABLE meetingroom(
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
	venue_id 	INTEGER NOT NULL,
	name		VARCHAR(40) NOT NULL,
	FOREIGN KEY FK_Rooms_hotel_id(venue_id) REFERENCES venue(id) ON DELETE CASCADE
)ENGINE=InnoDB;


CREATE TABLE website(
	id			INTEGER AUTO_INCREMENT primary key,-- Internal ID, do not modify, primary key
	wname		VARCHAR(40) NOT NULL-- First name of the user
)ENGINE=InnoDB;

CREATE TABLE venuewebsite(
	id INTEGER NOT NULL PRIMARY KEY,
	venue_id 	INTEGER,
	website_id 	INTEGER,
	visibility 	BOOLEAN NOT NULL,
	FOREIGN KEY FK_venuewebsite_venue_id(venue_id) REFERENCES venue(id) ON DELETE CASCADE,
	FOREIGN KEY FK_venuewebsite_website_id(website_id) REFERENCES website(id) ON DELETE CASCADE
)ENGINE=InnoDB;

CREATE TABLE bookingdata(
	id INTEGER NOT NULL,
	venuewebsite_id INTEGER,
	meetingroom_id INTEGER,
	price DECIMAL NOT NULL,
	FOREIGN KEY FK_bookingdata_venuewebsite_id(venuewebsite_id) REFERENCES venuewebsite(id),
	FOREIGN KEY FK_bookingdata_meetingroom_id(meetingroom_id) REFERENCES meetingroom(id),
	PRIMARY KEY(id, venuewebsite_id, meetingroom_id)
)ENGINE=InnoDB;


INSERT INTO venue(id, vname) VALUES(1, "Omena Hotel"), (2, "Radisson Hotel"), (3, "Yak and Yeti");
INSERT INTO meetingroom(id, venue_id, name) VALUES(1, 1, "Mango"), (2, 1, "Apple"), (3, 2, "Moon"), (4, 2, "Room Heart"), (5, 3, "Yak"), (6, 3, "Yeti");
INSERT INTO website(id, wname) VALUES(1, "ABC.com"), (2, "XYZ.com"), (3, "BookHotel.com");
INSERT INTO venuewebsite(id, venue_id, website_id, visibility) VALUES(1, 1, 1, 0), (2, 1, 2, 1), (3, 1, 3, 1), (4, 2, 1, 1), (5, 2, 2, 0), (6, 2, 3, 1), (7, 3, 1, 1), (8, 3, 2, 1), (9, 3, 3, 0);

INSERT INTO bookingdata(id, venuewebsite_id, meetingroom_id, price) VALUES(1, 1, 1, 100.0), (2, 1, 2, 200.0), (3, 2, 1, 300.0),
																			 (4, 2, 2, 400.0), (5, 3, 1, 500.0), (6, 3, 2, 600.0),
																			 (7, 4, 3, 250.0), (8, 4, 4, 350.0), (9, 5, 3, 450.0),
																			 (10, 5, 4, 550.0), (11, 6, 3, 650.0), (12, 6, 4, 750.0),
																			 (13, 7, 5, 800.0), (14, 7, 6, 900.0), (15, 8, 5, 1000.0),
																			 (16, 8, 6, 1100.0), (17, 9, 5, 1200.0), (18, 9, 6, 1300.0);


use bookingdb;
SELECT * FROM venue;
SELECT * FROM website;
SELECT * FROM venuewebsite;
SELECT * FROM meetingroom;
SELECT * FROM bookingdata;
/*
-- Get hotel name, website name, visibility from Channel Hotel Properties tables where the visibility is 1 or True.

use my_meeting_package;
select Hotels.name, Channels.name, visibility
	from (ChannelHotelProperties 
		JOIN Hotels 
			on ChannelHotelProperties.hotel_id = Hotels.id)
		JOIN Channels 
			ON ChannelHotelProperties.channel_id = Channels.id
			WHERE visibility = 1;


-- Get All the details despite the visibility

use my_meeting_package;
select Hotels.name, Channels.name,Rooms.name,ChannelHotelProperties.visibility, price from 
(AvailableBooking JOIN ChannelHotelProperties on 
AvailableBooking.channel_hotel_id = ChannelHotelProperties.id 
JOIN Hotels on hotel_id = Hotels.id JOIN Channels 
ON channel_id = Channels.id) 
JOIN Rooms ON AvailableBooking.room_id = Rooms.id;

--Get The details along with visibility

use my_meeting_package;
select Hotels.name, Channels.name,Rooms.name,ChannelHotelProperties.visibility, price from
 (AvailableBooking JOIN ChannelHotelProperties on
  AvailableBooking.channel_hotel_id = ChannelHotelProperties.id JOIN
   Hotels on hotel_id = Hotels.id JOIN Channels ON channel_id = Channels.id) JOIN
    Rooms ON AvailableBooking.room_id = Rooms.id;

--Get The details along with visibility True
use my_meeting_package;
select Hotels.name, Channels.name,Rooms.name,ChannelHotelProperties.visibility, price from
 (AvailableBooking JOIN ChannelHotelProperties on
  AvailableBooking.channel_hotel_id = ChannelHotelProperties.id JOIN
   Hotels on hotel_id = Hotels.id JOIN Channels ON channel_id = Channels.id) JOIN
    Rooms ON AvailableBooking.room_id = Rooms.id WHERE visibility = 1;

-- SELECT NECESSARY DATA IN REFERENCE TO WEBSITE ID
use my_meeting_package;
select ChannelHotelProperties.id, Hotels.name, Channels.name, visibility
	from (ChannelHotelProperties 
		JOIN Hotels 
			on ChannelHotelProperties.hotel_id = Hotels.id)
		JOIN Channels 
			ON ChannelHotelProperties.channel_id = Channels.id
			WHERE channel_id = 2 ;

--Pass Two Conditions

select channelhotelproperties.id, Hotels.name, Channels.name, visibility from
 (ChannelHotelProperties JOIN Hotels on ChannelHotelProperties.hotel_id = Hotels.id) 
 JOIN Channels ON ChannelHotelProperties.channel_id = Channels.id 
 WHERE channel_id = 2 AND visibility = 1;

 --Find All the price and details according to website id given -- Exact Assignment

 use bookingdb;
select venue.name, website.name,meetingroom.name,venuewebsite.visibility, price from
 (bookingdata JOIN venuewebsite on
  bookingdata.venuewebsite_id = venuewebsite.id JOIN
   venue on venue_id = venue.id JOIN website ON website_id = website.id) JOIN
    meetingroom ON bookingdata.meetingroom_id = meetingroom.id WHERE website_id = 2 AND visibility = 1;*/
















