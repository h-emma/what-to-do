<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<h1><?= $_GET['list-name']; ?></h1>

<!-- Form to create task -->
<div class="task-form">
    <h2>Add task</h2>
    <form action="app/task/create.php" method="post">
        <div class="add-task-title">
            <label for="task-title">Title</label>
            <input class="form-control" type="text" name="task-title" id="task-title" placeholder="title" required>
        </div>
        <div class="add-task-description">
            <label for="task-description">Description</label>
            <input class="form-control" type="text" name="task-description" id="task-description" placeholder="description" required>
        </div>
        <div class="add-task-deadline">
            <label for="task-deadline">Deadline</label>
            <input class="form-control" type="date" name="task-deadline" id="task-deadline" required>
        </div>
        <div class="add-task-completed">
            <input type="hidden" name="task-completed" id="task-completed" value="<?= 'NO' ?>">
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
        <div class="task-container">
            <h4 class="task-title"><?= $task['title']; ?></h4>
            <p class="task-description"><?= $task['description']; ?></p>
            <p class="task-deadline">Deadline: <?= $task['deadline']; ?></p>
            <p class="task-completed">Completed: <?= $task['completed']; ?></p>
            <!-- Button to delete task -->
            <form action="app/task/delete.php" method="post">
                <div class="add-action-task">
                    <label for="delete-task"></label>
                    <input type="hidden" name="delete-task" id="delete-task" value="<?= $task['id'] ?>">
                    <input type="hidden" name="list" id="list" value="<?= $task['list_id'] ?>">
                    <button type="submit" class="button-delete ">Delete</button>
            </form>
            <!-- Button to add completed task -->
            <form action="app/task/completed.php" method="post">
                <label for="completed"></label>
                <input type="hidden" name="task-id" id="task-id" value="<?= $task['id'] ?>">
                <input type="hidden" name="completed" id="completed" value="<?= $task['completed'] ?>">
                <input type="hidden" name="list" id="list" value="<?= $task['list_id'] ?>">
                <button type="submit" class="button-completed">Complete</button>
        </div>
        </form>
        </div>
    <?php endforeach; ?>
    <!-- form to update task -->
    <div class="task-form">
        <h2>Update task</h2>
        <form action="app/task/update.php" method="post">
            <div class="add-task-title">
                <label for="task-title">Title</label>
                <input class="form-control" type="text" name="task-title" id="task-title" placeholder="title" required>
            </div>
            <div class="add-task-description">
                <label for="task-description">Description</label>
                <input class="form-control" type="text" name="task-description" id="task-description" placeholder="description" required>
            </div>
            <div class="add-task-deadline">
                <label for="task-deadline">Deadline</label>
                <input class="form-control" type="date" name="task-deadline" id="task-deadline" required>
            </div>
            <div class="add-task-completed">
                <input type="hidden" name="task-completed" id="task-completed" value="<?= 'NO' ?>">
            </div>
            <div>
                <label for="select-task">Choose a task to update:</label>

                <select name="task" id="select-task">
                    <?php foreach (getTasksInList($_SESSION['user']['id'], $database) as $task) : ?>
                        <option value="<?= $task['id'] ?>"><?= $task['title']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="button-main">Update</button>
        </form>
    </div>
    <div class="list-form">
        <h2>Update list</h2>
        <?php $list = getList($_SESSION['user']['id'], $_GET['list-page'], $database) ?>
        <form action="app/list/update.php" method="post">
            <div class="add-list">
                <label for="title">Update title on the list</label>
                <input type="hidden" name="list-id" id="list-id" value="<?= $list['id'] ?>">
                <input class="form-control" type="text" name="title" id="title" placeholder="title" required>
            </div>
            <button type="submit" class="button-main">Update</button>
        </form>
    </div>
<?php endif; ?>
<?php require __DIR__ . '/views/footer.php'; ?>
