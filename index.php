<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1><?php echo $config['title']; ?></h1>
    <p></p>

    <?php if (isset($_SESSION['user'])) : ?>
        <p>Welcome, <?= htmlspecialchars($_SESSION['user']['username']); ?>!</p>
        <img src="<?= $_SESSION['user']['avatar_image']; ?>">

        <!-- Loop out the task that have deadline today by using a fuction that get the information from the db -->
        <?php
        foreach (getTasksDeadlineToday($_SESSION['user']['id'], $database) as $deadlineTodayTasks) : ?>
            <p><?= $deadlineTodayTasks['title']; ?></p>
            <p><?= $deadlineTodayTasks['description']; ?></p>
            <p><?= $deadlineTodayTasks['created']; ?></p>
            <p><?= $deadlineTodayTasks['deadline']; ?></p>
            <p><?= $deadlineTodayTasks['completed']; ?></p>

        <?php endforeach; ?>
    <?php endif; ?>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
