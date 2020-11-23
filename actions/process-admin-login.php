<?php

// ****************************************************************
// This script is used to process the submitted information from an 
// administrator login.
// ****************************************************************

session_start();
require_once('../config/config.php');

// Get the data from the POST array
$email = $_POST['email'];
$password = $_POST['password'];

// Check to make sure that no fields are blank
if (empty($email) || empty($password)) {
    header('Location: ../admin-login.php?blankValues=true');
    exit();
}

// Query the database for a matching email and password
$link = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DBNAME);
$stmt = mysqli_prepare($link, 'SELECT * FROM Administrators WHERE email=? AND `password`=?;');
$stmt->bind_param('ss', $email, $password);
$stmt->execute();
$result = $stmt->get_result();
$adminData = $result->fetch_assoc();

// If $adminData is NULL, then no match was found
if ($adminData == NULL) {
    header('Location: ../admin-login.php?noMatch=true');
    exit();
}

// Set up the administrator user session variables
$_SESSION['administratorId'] = $adminData['administratorId'];
$_SESSION['firstName'] = $adminData['firstName'];
$_SESSION['lastName'] = $adminData['lastName'];
$_SESSION['email'] = $adminData['email'];
$_SESSION['password'] = $adminData['password'];

// Redirect the user to the admin dashboard page
header('Location: ../admin-dashboard.php');

?>