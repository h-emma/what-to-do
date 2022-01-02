<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<h1><?= $_GET['list-name']; ?></h1>

<!-- Update title on list -->
<?php if (isset($_SESSION['user'])) : ?>
    <div class="list-form">
        <?php foreach (getLists($_SESSION['user']['id'], $database) as $list) : ?>
            <form action="app/list/update.php" method="post">
                <div class="add-list">
                    <label for="title">Update title on the list</label>
                    <input class="form-control" type="text" name="title" id="title" placeholder="title" required>
                </div>
                <button type="submit" class="button-main">Update title</button>
            </form>
        <?php endforeach; ?>
    <?php endif; ?>
    </div>
    <?php
    foreach (getTasksInList($_SESSION['user']['id'], $database) as $task) : ?>
        <p><?= $task['title']; ?></p>
        <p><?= $task['description']; ?></p>
        <p><?= $task['deadline']; ?></p>
    <?php endforeach; ?>
    <!-- button to add if task is completed -->
    <div class="add-task">
        <?php foreach (getTasks($_SESSION['user']['id'], $database) as $task) : ?>
            <form action="app/task/completed.php" method="post">
                <div class="add-task-completed">
                    <label for="completed"></label>
                    <input type="hidden" name="completed" id="completed" value="<?= $task['id'] ?>">
                    <button type="submit" class="button-completed" name="completed" id="completed" value="1"></button>
            </form>
        <?php endforeach; ?>
    </div>
    <!-- button to delete list -->
    <div class="list-form">
        <?php foreach (getTasks($_SESSION['user']['id'], $database) as $task) : ?>
            <form action="app/task/delete.php" method="post">
                <div class="add-list">
                    <label for="delete-list"></label>
                    <input type="hidden" name="delete-list" id="delete-list" value="<?= $task['id'] ?>">
                    <button type="submit" class="button-main">Delete <?= $task['title'] ?></button>
                </div>
            </form>
        <?php endforeach; ?>
    </div>
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
                    <label for="select-list">Choose a task to update:</label>

                    <select name="list" id="select-list">
                        <?php foreach (getTasks($_SESSION['user']['id'], $database) as $task) : ?>
                            <option value="<?= $task['id'] ?>"><?= $task['title']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="button-main">Update task</button>
        </form>
    </div>
    <?php require __DIR__ . '/views/footer.php'; ?>
