<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['list_id'])) {
    $completed = 'YES';
    $id = ($_POST['list_id']);

    $statement = $database->prepare('UPDATE tasks SET completed = :completed WHERE list_id = :id');

    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':completed', $completed, PDO::PARAM_STR);
    $statement->execute();
    back();
};
