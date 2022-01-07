<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<main>
    <h1>Change your settings</h1>
    <!-- Update email -->
    <form action="app/users/update-settings.php" method="post">
        <div class="update-email">
            <h2>Update you email</h2>
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="email@mail.com" required>
        </div>
        <button type="submit" class="button-main">Update</button>
    </form>
    <!-- Update password -->
    <form action="app/users/update-settings.php" method="post">
        <div class=update-password>
            <h2>Update you password</h2>
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
        </div>
        <button type="submit" class="button-main">Update</button>
    </form>
</main>

<?php require __DIR__ . '/views/footer.php'; ?>
