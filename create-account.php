<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1>Create an account</h1>

    <form action="app/users/register.php" method="post">
        <div class="register-username">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" id="username" placeholder="Username" required>
            <small class="form-text"></small>
        </div>

        <div class="login-emial">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="email@mail.com" required>
            <!-- <small class="form-text"></small> -->
        </div>

        <div class=login-password>
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
            <!-- <small class="form-text"></small> -->
        </div>

        <button type="submit" class="button-login">Login</button>
    </form>

    <p>Do you have an account, <a href="login.php">login!</a></p>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
