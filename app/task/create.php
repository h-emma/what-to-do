<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['task-title'])) {
    $title = ($_POST['task-title']);
    $description = ($_POST['task-description']);
    $created = ($_POST['task-created']);
    $deadline = ($_POST['task-deadline']);
    $completed = ($_POST['completed']);
    $id = $_SESSION['user']['id'];

    $statement = $database->prepare('INSERT INTO tasks (title, description, created, deadline, completed, user_id) VALUES (:title, :description, :created, :deadline, :completed, :user_id)');

    $statement->bindParam(':title', $title);
    $statement->bindParam(':description', $description);
    $statement->bindParam(':created', $created);
    $statement->bindParam('deadline', $deadline);
    $statement->bindParam('completed', $completed);
    $statement->bindParam(':user_id', $id);

    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
};

redirect('/lists.php');
