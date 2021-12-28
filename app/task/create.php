<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['task-title'])) {
    $title = trim(filter_var($_POST['task-title'], FILTER_SANITIZE_STRING));
    $description = ($_POST['task-description']);
    $created = ($_POST['task-created']);
    $deadline = ($_POST['task-deadline']);
    $completed = ($_POST['completed']);
    $id = $_SESSION['user']['id'];

    $statement = $database->prepare('INSERT INTO tasks (title, description, created, deadline, completed, user_id) VALUES (:title, :description, :created, :deadline, :completed, :user_id)');

    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':created', $created, PDO::PARAM_STR);
    $statement->bindParam('deadline', $deadline, PDO::PARAM_STR);
    $statement->bindParam('completed', $completed, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $id, PDO::PARAM_INT);

    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
};

redirect('/lists.php');
