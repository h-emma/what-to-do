<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['title'])) {
    $title = ($_POST['title']);
    $description = ($_POST['description']);
    $created = ($_POST['created']);
    $completed = ($_POST['completed']);
    $deadline = ($_POST['deadline']);
    $id = $_SESSION['user']['id'];

    $statement = $database->prepare('INSERT INTO tasks (title, description, created, completed, deadline, user_id) VALUES (:title, :description, :created, :completed, :deadline, :user_id)');

    $statement->bindParam(':title', $title);
    $statement->bindParam(':description', $description);
    $statement->bindParam(':created', $created);
    $statement->bindParam('completed', $completed);
    $statement->bindParam('deadline', $deadline);
    $statement->bindParam(':user_id', $id);

    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
};

redirect('/lists.php');
