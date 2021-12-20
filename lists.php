<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1>Add your to-do list</h1>
    <!-- <div class="list-container">
        <h2>Lists</h2>
        <?php foreach ($lists as $list) : ?>
            <p><?php echo $comment['name']; ?></p>
        <?php endforeach; ?>
    </div> -->

    </div>
    <div class="list-form">
        <form action="app/list/create.php" method="post">
            <div class="add-list">
                <label for="text">Lists title</label>
                <input class="form-control" type="text" name="lists-title" id="lists-title" placeholder="title" required>
            </div>
            <button type="submit" class="add-list">Add list</button>
        </form>
    </div>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
