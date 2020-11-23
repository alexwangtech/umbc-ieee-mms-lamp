<?php

session_start();

// If the administratorId has not been set yet, then the user is not authenticated
// to access this page, and should be redirected to the login form page.
// *******************************************************************************
if (!isset($_SESSION['administratorId'])) {
    header('Location: admin-login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php require_once('includes/scripts.php');?>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="icon" href="favicon.ico">
    <title>Admin Dashboard</title>
</head>

<body>
    <?php require_once('includes/admin-navbar.php');?>
</body>

</html>