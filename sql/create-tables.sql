/* CREATES THE TABLES FOR THE DATABASE */
/* *********************************** */
CREATE TABLE `Administrators` (
    `administratorId` INT NOT NULL AUTO_INCREMENT,
    `firstName` VARCHAR(255) NOT NULL,
    `lastName` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`administratorId`)
);
CREATE TABLE `Members` (
    `memberId` INT NOT NULL AUTO_INCREMENT,
    `firstName` VARCHAR(255) NOT NULL,
    `lastName` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`memberId`)
);
CREATE TABLE `Meetings`(
    `meetingId` INT NOT NULL AUTO_INCREMENT,
    `meetingDate` DATE NOT NULL,
    `meetingDescription` TEXT NOT NULL,
    PRIMARY KEY (`meetingId`)
);
CREATE TABLE `Attendances` (
    `attendanceId` INT NOT NULL AUTO_INCREMENT,
    `memberId` INT NOT NULL,
    `meetingId` INT NOT NULL,
    PRIMARY KEY (`attendanceId`),
    FOREIGN KEY (`memberId`) REFERENCES `Members`(`memberId`),
    FOREIGN KEY (`meetingId`) REFERENCES `Meetings`(`meetingId`)
);