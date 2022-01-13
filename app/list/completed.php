<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

var_dump($_POST['list_id']);
if (isset($_POST['list_id'])) {
    $completed = 'YES';
    // $id = $_SESSION['user']['id'];
    // $taskId = ($_POST['task-id']);
    $id = ($_POST['list_id']);

    $statement = $database->prepare('UPDATE tasks SET completed = :completed WHERE list_id = :id');

    // if ($completed === 'YES') {
    //     $completed = 'NO';
    // } else {
    //     $completed = 'YES';
    // }

    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':completed', $completed, PDO::PARAM_STR);
    $statement->execute();

    // $statement = $database->prepare('SELECT * FROM lists WHERE id = :list');
    // $statement->bindParam(':list', $inList, PDO::PARAM_INT);

    // $statement->execute();
    // $list = $statement->fetch(PDO::FETCH_ASSOC);

    // redirect("/list.php?list-page=$inList&list-name=$list[title]");
    back();
};
