<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1>Add your to-do list</h1>

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
<?php require __DIR__ . '/views/footer.php'; ?>
