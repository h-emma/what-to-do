<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['completed'])) {
    $completed = ($_POST['completed']);
    $id = $_SESSION['user']['id'];

    $statement = $database->prepare('UPDATE tasks SET completed = :completed WHERE id = :id');

    $statement->bindParam(':id', $id);
    $statement->bindParam(':completed', $completed);

    $statement->execute();
};
redirect('/lists.php');
