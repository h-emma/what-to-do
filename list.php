<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<h1><?= $_GET['list-name']; ?></h1>

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
            <label for="task-deadline">Deadline</label>
            <input class="form-control" type="date" name="task-deadline" id="task-deadline" required>
        </div>
        <div>
            <label for="select-list">Choose a list to add the task to: </label>

            <select name="list" id="select-list">
                <?php foreach (getLists($_SESSION['user']['id'], $database) as $list) : ?>
                    <option value="<?= $list['id'] ?>"><?= $list['title']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="hidden" name="list-name" value="<?= $list['title']; ?>">
        <button type="submit" class="button-main">Add task to list</button>
    </form>
</div>
<!-- Loop out task -->
<?php if (isset($_SESSION['user'])) : ?>
    <?php foreach (getTasksInList($_SESSION['user']['id'], $database) as $task) : ?>
        <p><?= $task['title']; ?></p>
        <p><?= $task['description']; ?></p>
        <p><?= $task['deadline']; ?></p>
        <!-- Button to delete task -->
        <form action="app/task/delete.php" method="post">
            <div class="add-list">
                <label for="delete-task"></label>
                <input type="hidden" name="delete-task" id="delete-task" value="<?= $task['id'] ?>">
                <input type="hidden" name="list" id="list" value="<?= $task['list_id'] ?>">
                <button type="submit" class="button-main">Delete <?= $task['title'] ?></button>
            </div>
        </form>
        <!-- Button to add completed task -->
        <form action="app/task/completed.php" method="post">
            <div class="add-task-completed">
                <label for="completed"></label>
                <input type="hidden" name="completed" id="completed" value="<?= $task['id'] ?>">
                <button type="submit" class="button-completed" name="completed" id="completed" value="1"></button>
        </form>
    <?php endforeach; ?>
    <!-- form to update task -->
    <div class="task-form">
        <form action="app/task/update.php" method="post">
            <div class="add-task">
                <label for="task-title">Task title</label>
                <input class="form-control" type="text" name="task-title" id="task-title" placeholder="title" required>
                <div class="add-task">
                    <label for="task-description">Task description</label>
                    <input class="form-control" type="text" name="task-description" id="task-description" placeholder="description" required>
                </div>
                <div class="add-task">
                    <label for="task-deadline">Deadline</label>
                    <input class="form-control" type="date" name="task-deadline" id="task-deadline" required>
                </div>
                <div>
                    <label for="select-task">Choose a task to update:</label>

                    <select name="task" id="select-task">
                        <?php foreach (getTasks($_SESSION['user']['id'], $database) as $task) : ?>
                            <option value="<?= $task['id'] ?>"><?= $task['title']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="button-main">Update task</button>
        </form>
    </div>
    <div class="list-form">
        <?php $list = getList($_SESSION['user']['id'], $_GET['list-page'], $database) ?>
        <form action="app/list/update.php" method="post">
            <div class="add-list">
                <label for="title">Update title on the list</label>
                <input type="hidden" name="list-id" id="list-id" value="<?= $list['id'] ?>">
                <input class="form-control" type="text" name="title" id="title" placeholder="title" required>
            </div>
            <button type="submit" class="button-main">Update title</button>
        </form>
    <?php endif; ?>
    </div>
    <?php require __DIR__ . '/views/footer.php'; ?>
