<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1>To-do lists</h1>

    </div>
    <div class="list-form">
        <form action="app/list/create.php" method="post">
            <div class="add-list">
                <label for="title">Lists title</label>
                <input class="form-control" type="text" name="title" id="title" placeholder="title" required>
            </div>
            <button type="submit" class="add-list">Add list</button>
        </form>
    </div>
    <div class="list-form">
        <form action="app/list/update.php" method="post">
            <div class="add-list">
                <label for="title">Update title on the list</label>
                <input class="form-control" type="text" name="title" id="title" placeholder="title" required>
            </div>
            <button type="submit" class="uppdate-title-list">Update title</button>
        </form>
    </div>
    <?php if (isset($_SESSION['user'])) : ?>
        <?php
        foreach (getLists($_SESSION['user']['id'], $database) as $list) : ?>
            <p><?php echo $list['title']; ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
</article>
<div class="list-form">
    <form action="app/list/delete.php" method="post">
        <div class="add-list">
            <input type="hidden" name="delete-list" value="title">
            <button type="submit">Delete list</button>
    </form>
</div>
<div class="task-form">
    <form action="app/task/completed.php" method="post">
        <div class="add-task-completed">
            <label for="checkbox-task-completed"></label>
            <input type="checkbox" name="checkbox-task-completed" id="checkbox-task-completed">
    </form>
</div>
<div class="task-form">
    <form action="app/task/create.php" method="post">
        <div class="add-task">
            <label for="title">Task title</label>
            <input class="form-control" type="text" name="task-title" id="task-title" placeholder="title" required>
        </div>
        <div class="add-task">
            <label for="description">Task description</label>
            <input class="form-control" type="text" name="task-description" id="task-description" placeholder="description" required>
        </div>
        <div class="add-task">
            <label for="created">Created at</label>
            <input class="form-control" type="date" name="task-created" id="task-created" required>
        </div>
        <div class="add-task">
            <label for="deadline">Deadline</label>
            <input class="form-control" type="date" name="task-deadline" id="task-deadline" required>
        </div>
        <button type="submit" class="add-task">Add task to list</button>
    </form>
</div>

<?php require __DIR__ . '/views/footer.php'; ?>
