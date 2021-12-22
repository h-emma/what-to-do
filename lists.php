<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1>To-do lists</h1>

    </div>
    <!-- add title to list -->
    <div class="list-form">
        <form action="app/list/create.php" method="post">
            <div class="add-list">
                <label for="title">Lists title</label>
                <input class="form-control" type="text" name="title" id="title" placeholder="title" required>
            </div>
            <button type="submit" class="add-list">Add list</button>
        </form>
    </div>
    <!-- Update list with now title -->
    <div class="list-form">
        <form action="app/list/update.php" method="post">
            <div class="add-list">
                <label for="title">Update title on the list</label>
                <input class="form-control" type="text" name="title" id="title" placeholder="title" required>
            </div>
            <button type="submit" class="uppdate-title-list">Update title</button>
        </form>
    </div>
    <!-- loop out the lists -->
    <?php if (isset($_SESSION['user'])) : ?>
        <?php
        foreach (getLists($_SESSION['user']['id'], $database) as $list) : ?>
            <p><?php echo $list['title']; ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
</article>
<!-- button to delete list -->
<div class="list-form">
    <form action="app/list/delete.php" method="post">
        <div class="add-list">
            <input type="hidden" name="delete-list" id="delete-list" value="<?= $list['id'] ?>">
            <button type="submit">Delete list</button>
    </form>
</div>
<!-- Checkbox to click in if task is completed -->
<div class="task-form">
    <form action="app/task/completed.php" method="post">
        <div class="add-task-completed">
            <label for="completed"></label>
            <input type="checkbox" name="completed[$id]" id="completed" value="1">
    </form>
</div>
<!-- Form to create task -->
<div class="task-form">
    <form action="app/task/create.php" method="post">
        <div class="add-task">
            <label for="task-title">Task title</label>
            <input class="form-control" type="text" name="task-title" id="task-title" placeholder="title" required>
        </div>
        <div class="add-task">
            <label for="task-description">Task description</label>
            <input class="form-control" type="text" name="task-description" id="task-description" placeholder="description" required>
        </div>
        <div class="add-task">
            <label for="task-created">Created at</label>
            <input class="form-control" type="date" name="task-created" id="task-created" required>
        </div>
        <div class="add-task">
            <label for="task-deadline">Deadline</label>
            <input class="form-control" type="date" name="task-deadline" id="task-deadline" required>
        </div>
        <button type="submit" class="add-task">Add task to list</button>
    </form>
</div>
<!-- Loop out tasks -->
<?php
foreach (getTasksInList($_SESSION['user']['id'], $database) as $task) : ?>
    <p><?php echo $task['title']; ?></p>
    <p><?php echo $task['description']; ?></p>
    <p><?php echo $task['created']; ?></p>
    <p><?php echo $task['deadline']; ?></p>
<?php endforeach; ?>

<?php require __DIR__ . '/views/footer.php'; ?>
