<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1>Change your settings</h1>
    <!-- Update email -->
    <form action="app/users/update-settings-for-user.php" method="post">
        <div class="update-email">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="email@mail.com" required>
        </div>
        <button type="submit" class="button-main">Update your email</button>
    </form>
    <!-- Update password -->
    <form action="app/users/update-settings-for-user.php" method="post">
        <div class=update-password>
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
        </div>
        <button type="submit" class="button-main">Update your password</button>
    </form>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
