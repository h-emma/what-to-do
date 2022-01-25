<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['completed'])) {
    $completed = ($_POST['completed']);
    $id = $_SESSION['user']['id'];
    $taskId = ($_POST['task-id']);
    $inList = ($_POST['list']);

    $statement = $database->prepare('UPDATE tasks SET completed = :completed WHERE id = :id');

    $completed = checkCompleted($completed);

    $statement->bindParam(':id', $taskId, PDO::PARAM_INT);
    $statement->bindParam(':completed', $completed, PDO::PARAM_STR);

    $statement->execute();

    $statement = $database->prepare('SELECT * FROM lists WHERE id = :list');
    $statement->bindParam(':list', $inList, PDO::PARAM_INT);

    $statement->execute();
    $list = $statement->fetch(PDO::FETCH_ASSOC);

    redirect("/list.php?list-page=$inList&list-name=$list[title]");
};
