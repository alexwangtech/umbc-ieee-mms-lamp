<?php

// Check to see if there's an alert for empty values
if (isset($_GET['emptyValues'])) {
    $emptyValues = $_GET['emptyValues'] == 'true' ? true : false;
} else {
    $emptyValues = false;
}

// Check to see if there's an alert for no user found
if (isset($_GET['noUser'])) {
    $noUser = $_GET['noUser'] == 'true' ? true : false;
} else {
    $noUser = false;
}

// Check to see if there's an alert for no meeting
if (isset($_GET['noMeeting'])) {
    $noMeeting = $_GET['noMeeting'] == 'true' ? true : false;
} else {
    $noMeeting = false;
}

// Check to see if there's an alert for already submitted attendance
if (isset($_GET['alreadySubmitted'])) {
    $alreadySubmitted = $_GET['alreadySubmitted'] == 'true' ? true : false;
} else {
    $alreadySubmitted = false;
}

// Check to see if there's an alert for attendance success
if (isset($_GET['success'])) {
    $success = $_GET['success'] == 'true' ? true : false;
} else {
    $success = false;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php require_once('includes/scripts.php');?>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="icon" href="favicon.ico">
    <script src="js/index.js"></script>
    <title>Submit Attendance</title>
</head>

<body class="bg-dark-slate-blue">
    <?php require_once('includes/ieee-navbar.php');?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center form-margin">
                    <div class="shadow p-3 mb-5 bg-white rounded">
                        <h3 class="text-center">Attendance</h3>

                        <?php
                        // Render an alert if there were blank values
                        if ($emptyValues == TRUE) {
                            echo '
                                <div class="alert alert-danger" role="alert">
                                    Missing values from one or more fields.
                                </div>';
                        }
                        
                        // Render an alert if there was no user found
                        if ($noUser == TRUE) {
                            echo '
                                <div class="alert alert-danger" role="alert">
                                    User not found.
                                </div>';
                        }

                        // Render an alert if there is no meeting
                        if ($noMeeting == TRUE) {
                            echo '
                                <div class="alert alert-danger" role="alert">
                                    No meeting right now.
                                </div>';
                        }

                        // Render an alert if user has already submitted attendance
                        if ($alreadySubmitted == TRUE) {
                            echo '
                                <div class="alert alert-danger" role="alert">
                                    Attendance already submitted.
                                </div>';
                        }

                        // Render an alert if attendance was successfully taken
                        if ($success == TRUE) {
                            echo '
                                <div class="alert alert-success" role="alert">
                                    Attendance successfully taken!
                                </div>';
                        }
                        ?>

                        <form action="actions/process-attendance.php" method="POST">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>