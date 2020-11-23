<!-- Administrator Navbar Component -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="images/ieee-icon.png" width="30" height="30" class="d-inline-block align-top" alt="IEEE Icon">
        <?php echo $_SESSION['firstName'];?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Meetings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Attendance</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About You</a>
            </li>
        </ul>
    </div>
    <a href="actions/logout.php" class="btn btn-outline-secondary">Log out</a>
</nav>