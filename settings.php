<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<main>
    <h1>Change your settings</h1>
    <!-- Update email -->
    <form action="app/users/update-settings.php" method="post">
        <div class="update-email">
            <h2>Update your email</h2>
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="email@mail.com" required>
        </div>
        <button type="submit" class="button-main">Update</button>
    </form>
    <!-- Update password -->
    <form action="app/users/update-settings.php" method="post">
        <div class=update-password>
            <h2>Update your password</h2>
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
        </div>
        <button type="submit" class="button-main">Update</button>
    </form>
    <!-- Delete user  -->
    <form action="app/users/delete.php" method="post">
        <div class=update-password>
            <h2>Delete your profile</h2>
        </div>
        <div class="flex-container">
            <?php if (isset($_SESSION['delete_error'])) : ?>
                <?php foreach ($_SESSION['delete_error'] as $error) : ?>
                    <p class="danger-alert"><?= $error; ?></p>
                <?php endforeach; ?>
                <?php unset($_SESSION['delete_error']) ?>
            <?php endif; ?>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <input type="hidden" name="delete_user" id="delete_user" value="<?= $_SESSION['user']['id'] ?>">
            <small>Please note that you can not change your mind.</small>
            <button type="submit" class="button-main button-danger">Delete</button>
        </div>
    </form>
</main>

<?php require __DIR__ . '/views/footer.php'; ?>
