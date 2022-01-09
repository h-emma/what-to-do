<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['task-title'])) {
    $title = trim(filter_var($_POST['task-title'], FILTER_SANITIZE_STRING));
    $description = ($_POST['task-description']);
    $deadline = ($_POST['task-deadline']);
    $completed = ($_POST['task-completed']);
    $inList = ($_POST['list']);
    $id = $_SESSION['user']['id'];

    $statement = $database->prepare('INSERT INTO tasks (title, description, deadline, completed, list_id, user_id) VALUES (:title, :description, :deadline, :completed, :list_id, :user_id)');

    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':deadline', $deadline, PDO::PARAM_STR);
    $statement->bindParam(':completed', $completed, PDO::PARAM_STR);
    $statement->bindParam(':list_id', $inList, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $id, PDO::PARAM_INT);

    $statement->execute();

    $statement = $database->prepare('SELECT * FROM lists WHERE id = :list');
    $statement->bindParam(':list', $inList, PDO::PARAM_INT);

    $statement->execute();
    $list = $statement->fetch(PDO::FETCH_ASSOC);

    redirect("list.php?list-page=$inList&list-name=$list[title]");
};
