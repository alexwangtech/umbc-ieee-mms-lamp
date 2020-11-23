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

// Query the database to find out the current status of the meeting
$link = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DBNAME);
$result = mysqli_query($link, "SELECT statusValue FROM Status WHERE statusType='MEETING';");
$status = ($result->fetch_assoc())['statusValue'];
$active = ($status == 'TRUE') ? true : false;

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
    <div class="container">
        <div class="row">
            <div class="col mt-3">
                <div class="alert <?php echo $active ? 'alert-success' : 'alert-danger';?>" role="alert">
                    <h2 class="display-3 text-center">
                        <?php echo $active ? 'Attendance: Active' : 'Attendance: Inactive';?>
                    </h2>
                    <div class="d-flex justify-content-center">
                        <a href="actions/toggle-meeting.php"
                            class="btn <?php echo $active ? 'btn-danger' : 'btn-success';?>">
                            <?php echo $active ? 'End Meeting' : 'Start Meeting';?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>