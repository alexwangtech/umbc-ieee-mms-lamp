<?php

// ************************************************
// This script is for logging out an administrator.
// ************************************************

session_start();

// Unset all of the session variables and destroy the session
$_SESSION = array();
session_destroy();

// Redirect back to the login page
header('Location: ../admin-login.php');

?>