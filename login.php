<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1>Login</h1>

    <form action="app/users/login.php" method="post">
        <div class="login-email">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="email@mail.com" required>
        </div>

        <div class=login-password>
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
        </div>

        <button type="submit" class="button-main">Log in</button>
    </form>

    <p>Don't you have an account, <a class="link" href="create-account.php">create one!</a></p>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
