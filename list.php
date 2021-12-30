<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<h1><?= $_GET['list-name']; ?></h1>

<!-- Update title on list -->
<!-- <?php if (isset($_SESSION['user'])) : ?>
    <div class="list-form">
        <?php foreach (getLists($_SESSION['user']['id'], $database) as $list) : ?>
            <form action="app/list/update.php" method="post">
                <div class="add-list">
                    <label for="title">Update title on the list</label>
                    <input class="form-control" type="text" name="title" id="title" value="<?= $list['id'] ?>" placeholder="title" required>
                </div>
                <button type="submit" class="button-main">Update title</button>
            </form>
        <?php endforeach; ?>
    <?php endif; ?>
    </div> -->
<?php
foreach (getTasksInList($_SESSION['user']['id'], $database) as $task) : ?>
    <p><?= $task['title']; ?></p>
    <p><?= $task['description']; ?></p>
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
<!-- button to delete list -->
<div class="list-form">
    <?php foreach (getTasks($_SESSION['user']['id'], $database) as $task) : ?>
        <form action="app/task/delete.php" method="post">
            <div class="add-list">
                <input type="hidden" name="delete-list" id="delete-list" value="<?= $task['id'] ?>">
                <button type="submit" class="button-main">Delete <?= $task['title'] ?></button>
            </div>
        </form>
    <?php endforeach; ?>
</div>

<?php require __DIR__ . '/views/footer.php'; ?>
