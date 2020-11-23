<?php

// Check to see if there's a parameter for empty values
if (isset($_GET['emptyValues'])) {
    $emptyValues = $_GET['emptyValues'] == 'true' ? true : false;
} else {
    $emptyValues = false;
}

// Check to see if there's a parameter for password mismatch
if (isset($_GET['passwordsMismatch'])) {
    $passwordsMismatch = $_GET['passwordsMismatch'] == 'true' ? true : false;
} else {
    $passwordsMismatch = false;
}

// Check to see if there's a parameter for email used
if (isset($_GET['emailUsed'])) {
    $emailUsed = $_GET['emailUsed'] == 'true' ? true : false;
} else {
    $emailUsed = false;
}

// Check to see if there's a parameter for member success
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
    <title>Sign Up</title>
</head>

<body class="bg-dark-slate-blue">
    <?php require_once('includes/ieee-navbar.php');?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center form-margin">
                    <div class="shadow p-3 mb-5 bg-white rounded">
                        <h3 class="text-center">Sign Up</h3>

                        <?php
                        // Render an alert if there are blank fields
                        if ($emptyValues == TRUE) {
                            echo '
                                <div class="alert alert-danger" role="alert">
                                    Empty values in one or more fields.
                                </div>';
                        }

                        // Render an alert if passwords do not match
                        if ($passwordsMismatch == TRUE) {
                            echo '
                                <div class="alert alert-danger" role="alert">
                                    Passwords do not match.
                                </div>';
                        }

                        // Render an alert if passwords do not match
                        if ($emailUsed == TRUE) {
                            echo '
                                <div class="alert alert-danger" role="alert">
                                    Email is already in use.
                                </div>';
                        }
                        
                        // Render an alert if member creation was successful
                        if ($success == TRUE) {
                            echo '
                                <div class="alert alert-success" role="alert">
                                    New member created!
                                </div>';
                        }
                        ?>

                        <form action="actions/process-signup.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName"
                                        placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName"
                                        placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password">
                                </div>
                                <div class="form-group col-6">
                                    <label for="reenterPassword">Re-Enter Password</label>
                                    <input type="password" class="form-control" id="reenterPassword"
                                        name="reenterPassword" placeholder="Password">
                                </div>
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