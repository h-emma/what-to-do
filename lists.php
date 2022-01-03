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
<?php require __DIR__ . '/views/footer.php'; ?>
