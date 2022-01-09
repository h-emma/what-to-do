<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['task-title'])) {

    $taskId = $_POST['task'];
    $title = trim(filter_var($_POST['task-title'], FILTER_SANITIZE_STRING));
    $description = ($_POST['task-description']);
    $deadline = ($_POST['task-deadline']);
    //$id = $_SESSION['user']['id'];

    $statement = $database->prepare('UPDATE tasks SET title = :title, description = :description, deadline = :deadline WHERE id = :task_id');

    $statement->bindParam(':task_id', $taskId, PDO::PARAM_INT);
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':deadline', $deadline, PDO::PARAM_STR);

    $statement->execute();

    $list = getListTaskIsIn($taskId, $database);

    redirect("/list.php?list-page=$list[id]&list-name=$list[title]");
};
