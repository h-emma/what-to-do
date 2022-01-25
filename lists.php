<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<main>
    <h1>All lists</h1>

    </div>
    <!-- add title to list -->
    <div class="add-list">
        <h2>Create new list</h2>

        <form action="app/list/create.php" method="post">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" id="title" placeholder="title on the list" required>
            <button type="submit" class="button-main">Add list</button>
        </form>

    </div>
    <!-- loop out the lists -->
    <h3 class="list-heding">Your lists</h3>
    <p>Get to your list by click on it</p>
    <?php
    foreach (getLists($_SESSION['user']['id'], $database) as $list) : ?>
        <div class="list-container">
            <form action="list.php" method="GET">
                <div class="list">
                    <input type="hidden" name="list-page" id="list-page" value="<?= $list['id'] ?>">
                    <input type="hidden" name="list-name" id="list-name" value="<?= $list['title'] ?>">
                    <button type="submit" class="button-list"><?= htmlspecialchars($list['title']); ?></button>
                </div>
                <!-- button to delete list -->
            </form>
            <form action="app/list/delete.php" method="post">
                <div class="add-list">
                    <input type="hidden" name="delete-list" id="delete-list" value="<?= $list['id'] ?>">
                    <button type="submit" class="button-delete">Delete</button>
                </div>
            </form>
            <form action="app/list/completed.php" method="post">
                <div class="add-list">
                    <input type="hidden" name="list_id" id="list_id" value="<?= $list['id'] ?>">
                    <button type="submit" class="button-delete">Complete</button>
                </div>
            </form>
        </div>
    <?php endforeach; ?>
</main>

<?php require __DIR__ . '/views/footer.php'; ?>
