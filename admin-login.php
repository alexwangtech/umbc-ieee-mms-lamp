<?php

session_start();

// If the SESSION 'administratorId' is already set, then the user
// can be redirected to the administrator dashboard
// **************************************************************
if (isset($_SESSION['administratorId'])) {
    header('Location: admin-dashboard.php');
    exit();
}

// Check to see if there is a parameter for blank values
if (isset($_GET['blankValues'])) {
    $blankValues = $_GET['blankValues'] == 'true' ? true : false;
} else {
    $blankValues = false;
}

// Check to see if there is a parameter for no match (login invalid)
if (isset($_GET['noMatch'])) {
    $noMatch = $_GET['noMatch'] == 'true' ? true : false;
} else {
    $noMatch = false;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php require_once('includes/scripts.php');?>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="icon" href="favicon.ico">
    <title>Administrator Login</title>
</head>

<body class="bg-dark-slate-blue">
    <?php require_once('includes/ieee-navbar.php');?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center form-margin">
                    <div class="shadow p-3 mb-5 bg-white rounded">
                        <h3 class="text-center">Administrator</h3>

                        <?php
                        // Render an alert if there are blank values
                        if ($blankValues == TRUE) {
                            echo '
                                <div class="alert alert-danger" role="alert">
                                    Missing values in one or more fields.
                                </div>';
                        }

                        // Render an alert if the login failed (no match)
                        if ($noMatch == TRUE) {
                            echo '
                                <div class="alert alert-danger" role="alert">
                                    Invalid email or password.
                                </div>';
                        }
                        ?>

                        <form action="actions/process-admin-login.php" method="POST">
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