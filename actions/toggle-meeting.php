<?php

// **************************************************************************
// This script is for toggling the status of 'MEETING' in the 'Status' table.
// **************************************************************************

require_once('../config/config.php');

// Query the database to find the current status
$link = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DBNAME);
$result = mysqli_query($link, "SELECT statusValue FROM Status WHERE statusType='MEETING';");
$status = ($result->fetch_assoc())['statusValue'];

// Make our query based on the current value of $status
if ($status == 'FALSE') {
    mysqli_query($link, "UPDATE Status SET statusValue='TRUE' WHERE statusType='MEETING';");
} else {
    mysqli_query($link, "UPDATE Status SET statusValue='FALSE' WHERE statusType='MEETING';");
}

// Now we can redirect back to the administrator dashboard
header('Location: ../admin-dashboard.php');

?>