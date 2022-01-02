<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['completed'])) {
    $completed = ($_POST['completed']);
    $id = $_SESSION['user']['id'];

    $statement = $database->prepare('UPDATE tasks SET completed = :completed WHERE id = :id');

    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':completed', $completed, PDO::PARAM_STR);

    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
};
redirect('/list.php');
