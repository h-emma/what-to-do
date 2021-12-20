<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['title'])) {
    $title = ($_POST['title']);
    $id = $_SESSION['user']['id'];

    $statement = $database->prepare('UPDATE lists SET title = :title WHERE id = :id');

    $statement->bindParam(':id', $id);
    $statement->bindParam(':title', $title);

    $statement->execute();
};
redirect('/lists.php');
