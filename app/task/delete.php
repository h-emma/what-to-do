<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['delete-task'])) {
    $id = $_POST['delete-task'];

    $statement = $database->prepare('DELETE FROM tasks WHERE id = :id;');

    $statement->bindParam(':id', $id, PDO::PARAM_INT);

    $statement->execute();
};
redirect('/list.php');
