<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<main>
    <h1>All tasks</h1>
    <?php if (isset($_SESSION['user'])) : ?>
        <div class="search-container">
            <form action="" method="get">
                <label for="search">Search</label>
                <input type="text" name="search" id="search" maxlength="35">
                <!-- <input type="hidden" name="user_id" id="user_id"> -->
                <button type="submit" class="button-list">Find my task</button>
            </form>
        </div>

        <?php if (isset($_GET['search'])) : ?>
            <?php foreach (searchTasks($_GET['search'], $database) as $task) : ?>
                <div class="task-container">
                    <h4 class="task-title"><?= htmlspecialchars($task['title']); ?></h4>
                    <p class="task-description"><?= htmlspecialchars($task['description']); ?></p>
                    <p class="task-deadline">Deadline: <?= htmlspecialchars($task['deadline']); ?></p>
                    <p class="task-completed">Completed: <?= htmlspecialchars($task['completed']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if (!isset($_GET['search'])) : ?>
            <?php foreach (getAllTasks($_SESSION['user']['id'], $database) as $task) : ?>
                <div class="task-container">
                    <h4 class="task-title"><?= htmlspecialchars($task['title']); ?></h4>
                    <p class="task-description"><?= htmlspecialchars($task['description']); ?></p>
                    <p class="task-deadline">Deadline: <?= htmlspecialchars($task['deadline']); ?></p>
                    <p class="task-completed">Completed: <?= htmlspecialchars($task['completed']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif ?>

    <?php endif; ?>
</main>

<?php require __DIR__ . '/views/footer.php'; ?>
