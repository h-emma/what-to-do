<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['delete-task'])) {
    $id = $_POST['delete-task'];
    $inList = ($_POST['list']);


    $statement = $database->prepare('DELETE FROM tasks WHERE id = :id;');

    $statement->bindParam(':id', $id, PDO::PARAM_INT);

    $statement->execute();

    $statement = $database->prepare('SELECT * FROM lists WHERE id = :list');
    $statement->bindParam(':list', $inList, PDO::PARAM_INT);

    $statement->execute();
    $list = $statement->fetch(PDO::FETCH_ASSOC);

    redirect("list.php?list-page=$inList&list-name=$list[title]");
};
