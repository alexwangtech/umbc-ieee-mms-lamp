<?php

// *************************************************************************
// This script is used for processing the user information that results from
// a submission from the signup page.
// *************************************************************************

require_once('../config/config.php');

// Get the information from the POST array
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
$reenterPassword = $_POST['reenterPassword'];

// If there are empty fields, send an alert back to the signup page
if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($reenterPassword)) {
    header('Location: ../signup.php?emptyValues=true');
    exit();
}

// If the passwords do not match, send an alert back to the signup page
if ($password !== $reenterPassword) {
    header('Location: ../signup.php?passwordsMismatch=true');
    exit();
}

// Query the database to see if the user's email is already in use
$link = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DBNAME);
$stmt = mysqli_prepare($link, "SELECT * FROM Members WHERE email=?;");
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

// If the $data is not null, send an alert back to the signup page
if ($data != NULL) {
    header('Location: ../signup.php?emailUsed=true');
    exit();
}

// Otherwise, we can go ahead and create a new member
$stmt = mysqli_prepare($link, 'INSERT INTO Members (firstName, lastName, email, `password`) VALUES (?, ?, ?, ?);');
$stmt->bind_param('ssss', $firstName, $lastName, $email, $password);
$stmt->execute();

// Now we can send a success alert back to the signup page
header('Location: ../signup.php?success=true');
exit();

?>