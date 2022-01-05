<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<main>
    <h1><?php echo $config['title']; ?></h1>
    <!-- If the user is not logged in show this -->
    <?php
    if (!isset($_SESSION['user'])) : ?>
        <p>Create an account and log in to start create your to-do lists!</p>
    <?php endif; ?>

    <?php if (isset($_SESSION['user'])) : ?>
        <div class="user-container">
            <img src="<?= $_SESSION['user']['avatar_image']; ?>" alt="Your profile image">
            <h2>Welcome, <?= htmlspecialchars($_SESSION['user']['username']); ?>!</h2>
        </div>

        <!-- Loop out the task that have deadline today -->
        <h3 class="heading-deadline">Deadline today: </h3>
        <?php foreach (getTasksDeadlineToday($_SESSION['user']['id'], $database) as $deadlineTodayTasks) : ?>
            <div class="task-container">
                <h4 class="task-title"><?= $deadlineTodayTasks['title']; ?></h4>
                <p class="task-description"><?= $deadlineTodayTasks['description']; ?></p>
                <p class="task-deadline">Deadline: <?= $deadlineTodayTasks['deadline']; ?></p>
                <p class="task-completed">Completed: <?= $deadlineTodayTasks['completed']; ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</main>

<?php require __DIR__ . '/views/footer.php'; ?>
