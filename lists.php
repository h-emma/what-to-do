<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1>Create your to-do lists</h1>

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

    <!-- loop out the lists -->
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
</article>
<!-- button to delete list -->
<div class="list-form">
    <?php foreach (getLists($_SESSION['user']['id'], $database) as $list) : ?>
        <form action="app/list/delete.php" method="post">
            <div class="add-list">
                <input type="hidden" name="delete-list" id="delete-list" value="<?= $list['id'] ?>">
                <button type="submit" class="button-main">Delete <?= $list['title'] ?></button>
            </div>
        </form>
    <?php endforeach; ?>
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
            <label for="task-deadline">Deadline</label>
            <input class="form-control" type="date" name="task-deadline" id="task-deadline" required>
        </div>
        <div>
            <label for="select-list">Choose a list to add the task to:</label>

            <select name="list" id="select-list">
                <?php foreach (getLists($_SESSION['user']['id'], $database) as $list) : ?>
                    <option value="<?= $list['id'] ?>"><?= $list['title']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="button-main">Add task to list</button>
    </form>
</div>

<?php require __DIR__ . '/views/footer.php'; ?>
