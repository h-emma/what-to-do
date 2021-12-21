<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1><?php echo $config['title']; ?></h1>
    <p></p>

    <?php if (isset($_SESSION['user'])) : ?>
        <p>Welcome, <?php echo $_SESSION['user']['username']; ?>!</p>
        <img src="<?php echo $_SESSION['user']['avatar_image']; ?>">
    <?php endif; ?>
</article>

<!-- Loop out the task that have deadline today by using a fuction that get the information from the db -->
<?php require __DIR__ . '/views/footer.php'; ?>
