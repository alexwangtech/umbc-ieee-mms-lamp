<?php

session_start();
require_once('config/config.php');

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
    <title>Admin Meetings</title>
</head>

<body>
    <?php require_once('includes/admin-navbar.php');?>
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Meeting ID</th>
                            <th scope="col">Meeting Date</th>
                            <th scope="col">Meeting Description</th>
                        </tr>
                    </thead>
                    <tbody id="tbody"></tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="js/admin-meetings.js"></script>
</body>

</html>