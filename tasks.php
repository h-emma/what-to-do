<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<main>
    <h1>All tasks</h1>
    <?php if (isset($_SESSION['user'])) : ?>
        <?php foreach (getAllTasks($_SESSION['user']['id'], $database) as $task) : ?>
            <div class="task-container">
                <h4 class="task-title"><?= $task['title']; ?></h4>
                <p class="task-description"><?= $task['description']; ?></p>
                <p class="task-deadline">Deadline: <?= $task['deadline']; ?></p>
                <p class="task-completed">Completed: <?= $task['completed']; ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</main>

<?php require __DIR__ . '/views/footer.php'; ?>