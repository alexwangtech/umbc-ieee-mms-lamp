/* CREATES DUMMY DATA FOR THE DATABASE */
/* *********************************** */

/* Insert data into the 'Administrators' table */
INSERT INTO `Administrators` (firstName, lastName, email, `password`)
VALUES ('Raymond', 'Wang', 'wanalex1@umbc.edu', '3skAyisB@e');
INSERT INTO `Administrators` (firstName, lastName, email, `password`)
VALUES ('Alexander', 'Wang', 'alex915979wang@gmail.com', 'alexander915979');

/* Insert data into the 'Members' table */
INSERT INTO `Members` (firstName, lastName, email, `password`)
VALUES ('Bob', 'Ross', 'bobross@umbc.edu', 'bobross');
INSERT INTO `Members` (firstName, lastName, email, `password`)
VALUES ('Michael', 'Jackson', 'michaeljackson@umbc.edu', 'michaeljackson');

/* Insert data into the 'Meetings' table */
INSERT INTO `Meetings` (meetingDate, meetingDescription)
VALUES ('2020-01-01', 'First meeting of the year where we introduced UMBC IEEE.');
INSERT INTO `Meetings` (meetingDate, meetingDescription)
VALUES ('2020-02-01', 'Second meeting of the year where we talked about basic programming concepts.');


/* Insert data into the 'Attendances' table */
INSERT INTO `Attendances` (memberId, meetingId)
VALUES (1, 1);
INSERT INTO `Attendances` (memberId, meetingId)
VALUES (1, 2);