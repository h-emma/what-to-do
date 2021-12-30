<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1><?php echo $config['title']; ?></h1>
    <p></p>

    <?php if (isset($_SESSION['user'])) : ?>
        <p>Welcome, <?= htmlspecialchars($_SESSION['user']['username']); ?>!</p>
        <img src="<?= $_SESSION['user']['avatar_image']; ?>" alt="Your profile image">

        <!-- Loop out the task that have deadline today -->
        <?php
        foreach (getTasksDeadlineToday($_SESSION['user']['id'], $database) as $deadlineTodayTasks) : ?>
            <p><?= $deadlineTodayTasks['title']; ?></p>
            <p><?= $deadlineTodayTasks['description']; ?></p>
            <p><?= $deadlineTodayTasks['deadline']; ?></p>
            <p><?= $deadlineTodayTasks['completed']; ?></p>
            <div class="add-task">
                <form action="app/task/completed.php" method="post">
                    <div class="add-task-completed">
                        <label for="completed"></label>
                        <input type="checkbox" name="completed" id="completed" value="1">
                </form>
            </div>

        <?php endforeach; ?>
    <?php endif; ?>
    <!-- add button to save update task completed -->
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
