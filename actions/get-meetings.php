<?php

// ***********************************************************************
// This script is used to retrieve all meetings from the "Meetings" table.
// ***********************************************************************

session_start();
require_once('../config/config.php');

// Make sure that no unauthenticated requests are being made
if (!isset($_SESSION['administratorId'])) {
    exit();
}

// Query the data from the "Meetings" table
$link = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DBNAME);
$result = mysqli_query($link, 'SELECT * FROM Meetings ORDER BY meetingId DESC;');
$rows = $result->fetch_all(MYSQLI_ASSOC);

// JSON encode this data and return it
echo json_encode($rows);

?>