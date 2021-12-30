<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1>Create an account</h1>

    <form action="app/users/register.php" method="post" enctype="multipart/form-data">
        <div class="register-username">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" id="username" placeholder="Username" required>
        </div>

        <div class="register-emial">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="email@mail.com" required>

        </div>

        <div class=register-password>
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>

        </div>
        <div class=register-avatar>
            <label for="avatar_image">Upload an image</label>
            <input class="form-control" type="file" name="avatar_image" id="avatar_image" accept=".png, .jpg, .jpeg" required>
        </div>
        <button type="submit" class="button-main">Create an account</button>
    </form>

    <p>Do you have an account, <a href="login.php">log in!</a></p>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
