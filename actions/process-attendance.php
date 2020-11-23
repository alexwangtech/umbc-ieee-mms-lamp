<?php

// *************************************************************************
// This script is used for processing the user information that results from
// a submission from the 'index.php' form.
// *************************************************************************

require_once('../config/config.php');

// Get the form information from the POST array
$email = $_POST['email'];
$password = $_POST['password'];

// Check to make sure that none of the values are blank
if (empty($email) || empty($password)) {
    header('Location: ../index.php?emptyValues=true');
    exit();
}

// Query the database to see if there's a match for the user
$link = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DBNAME);
$stmt = mysqli_prepare($link, 'SELECT * FROM Members WHERE email=? AND `password`=?;');
$stmt->bind_param('ss', $email, $password);
$stmt->execute();
$result = $stmt->get_result();
$memberInfo = $result->fetch_assoc();

// If the retrieved data is NULL, send an alert back to the 'Attendance' page
if ($memberInfo == NULL) {
    header('Location: ../index.php?noUser=true');
    exit();
}

// Get the needed values from the $memberInfo result
$memberId = $memberInfo['memberId'];

// Query the database to see whether attendance is available right now
$result = mysqli_query($link, "SELECT statusValue FROM Status WHERE statusType='MEETING';");
$meetingStatus = ($result->fetch_assoc())['statusValue'];

// If the meeting status iS FALSE, send an alert back to the 'Attendance' page
if ($meetingStatus == 'FALSE') {
    header('Location: ../index.php?noMeeting=true');
    exit();
}

// First, we need to query the database to get the latest meeting ID. We can assume
// that the meeting is active, because earlier we checked to see if there's no meeting.
// ************************************************************************************
$result = mysqli_query($link, 'SELECT MAX(meetingId) AS meetingId FROM Meetings;');
$meetingId = ($result->fetch_assoc())['meetingId'];

// Now, we need to find out whether the user has already submitted attendance
$stmt = mysqli_prepare($link, 'SELECT * FROM Attendances WHERE memberId=? AND meetingId=?;');
$stmt->bind_param('ii', $memberId, $meetingId);
$stmt->execute();
$result = $stmt->get_result();
$meetingData = $result->fetch_assoc();

// If $meetingData is not NULL, send an alert back to the 'Attendance' page
if ($meetingData != NULL) {
    header('Location: ../index.php?alreadySubmitted=true');
    exit();
}

// Otherwise, we want to create a new row in the 'Attendances' table
else {
    $stmt = mysqli_prepare($link, 'INSERT INTO Attendances (memberId, meetingId) VALUES (?, ?);');
    $stmt->bind_param('ii', $memberId, $meetingId);
    $stmt->execute();

    // At this point, we can send back an alert indicating success in recording attendance
    header('Location: ../index.php?success=true');
    exit();
}

?>