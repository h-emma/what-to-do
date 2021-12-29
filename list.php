<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<h1><?= $_GET['list-name']; ?></h1>
<?php
foreach (getTasksInList($_SESSION['user']['id'], $database) as $task) : ?>
    <p><?= $task['title']; ?></p>
    <p><?= $task['description']; ?></p>
    <p><?= $task['created']; ?></p>
    <p><?= $task['deadline']; ?></p>
    <p><?= $task['completed']; ?></p>
    <div class="add-task">
        <form action="app/task/completed.php" method="post">
            <div class="add-task-completed">
                <label for="completed"></label>
                <input type="checkbox" name="completed" id="completed" value="1">
        </form>
    </div>
<?php endforeach; ?>

<?php require __DIR__ . '/views/footer.php'; ?>
