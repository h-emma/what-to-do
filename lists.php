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
            <button type="submit" class="button-main">Add list</button>
        </form>
    </div>
    <!-- Update list with new title -->
    <div class="list-form">
        <form action="app/list/update.php" method="post">
            <div class="add-list">
                <label for="title">Update title on the list</label>
                <input class="form-control" type="text" name="title" id="title" placeholder="title" required>
            </div>
            <button type="submit" class="button-main">Update title</button>
        </form>
    </div>
    <!-- loop out the lists -->
    <?php if (isset($_SESSION['user'])) : ?>
        <?php
        foreach (getLists($_SESSION['user']['id'], $database) as $list) : ?>
            <form action="list.php" method="GET">
                <div class="list">
                    <input type="hidden" name="list-page" id="list-page" value="<?= $list['id'] ?>">
                    <input type="hidden" name="list-name" id="list-name" value="<?= $list['title'] ?>">
                    <button type="submit" class="button-main"><?= $list['title'] ?></button>
                </div>
            </form>

        <?php endforeach; ?>
    <?php endif; ?>
</article>
<!-- button to delete list -->
<div class="list-form">
    <form action="app/list/delete.php" method="post">
        <div class="add-list">
            <input type="hidden" name="delete-list" id="delete-list" value="<?= $list['id'] ?>">
            <button type="submit" class="button-main">Delete list</button>
        </div>
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
        <!-- Checkbox to click in if task is completed -->
        <div class="add-task">
            <form action="app/task/completed.php" method="post">
                <div class="add-task-completed">
                    <label for="completed"></label>
                    <input type="checkbox" name="completed" id="completed" value="1">
            </form>
        </div>
        <div>
            <label for="select-list">Choose a list:</label>

            <select name="list" id="select-list">
                <?php foreach (getLists($_SESSION['user']['id'], $database) as $list) : ?>
                    <?php $listId = $list['id'] ?>
                    <option value="<?= $listId ?>"><?= $list['title']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="button-main">Add task to list</button>
    </form>
</div>
<!-- Loop out tasks -->
<!-- <?php
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
button to delete task
<div class="list-form">
    <form action="app/task/delete.php" method="post">
        <div class="add-task">
            <input type="hidden" name="delete-task" id="delete-task" value="<?= $task['id'] ?>">
            <button type="submit" class="button-main">Delete task</button>
    </form>
</div> -->

<?php require __DIR__ . '/views/footer.php'; ?>
