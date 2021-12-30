<nav class="nav-container">
    <a class="nav-loga" href="#"><?= $config['title']; ?></a>
    <div class="hamburger">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link <?= $_SERVER['SCRIPT_NAME'] === '/index.php' ? 'active' : ''; ?>" href="/index.php">Home</a>
        </li>

        <li class="nav-item">
            <?php if (isUserLoggedIn()) : ?>
                <a class="nav-link" href="lists.php">Create to-do lists</a>
            <?php else : ?>
                <a class="nav-link <?= $_SERVER['SCRIPT_NAME'] === '/login.php' ? 'active' : ''; ?>" href="login.php">Log in</a>
            <?php endif; ?>
        </li>

        <li class="nav-item">
            <?php if (isUserLoggedIn()) : ?>
                <a class="nav-link" href="settings-for-user.php">Settings</a>
            <?php else : ?>
                <a class="nav-link <?= $_SERVER['SCRIPT_NAME'] === '/create-account.php' ? 'active' : ''; ?>" href="/create-account.php">Create an account</a>
            <?php endif; ?>
        </li>

        <li class="nav-item">
            <?php if (isUserLoggedIn()) : ?>
                <a class="nav-link" href="/app/users/logout.php">Log out</a>
            <?php endif; ?>
    </ul>
</nav>
