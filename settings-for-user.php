<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1>Change your settings</h1>

    <form action="app/users/update-settings-for-user.php" method="post">
        <div class="update-emial">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="email@mail.com" required>
            <!-- <small class="form-text"></small> -->
        </div>
        <button type="submit" class="button-update-settings">Update</button>
    </form>

    <form action="app/users/edit-settings-for-user.php" method="post">
        <div class=update-password>
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
            <!-- <small class="form-text"></small> -->
        </div>
        <button type="submit" class="button-update-settings">Update</button>
    </form>

    <form action="app/users/edit-settings-for-user.php" method="post" enctype="multipart/form-data">
        <div class=update-avatar>
            <label for="avatar">Upload an image in PNG format</label>
            <input class="form-control" type="file" name="avatar" id="avatar" accept=".png" required>
        </div>
        <button type="submit" class="button-update-settings">Update</button>
    </form>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
