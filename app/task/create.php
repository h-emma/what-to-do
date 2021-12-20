<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['title'])) {
    $title = ($_POST['title']);
    $id = $_SESSION['user']['id'];


    $statement = $database->prepare('INSERT INTO lists (title, user_id) VALUES (:title, :user_id)');

    $statement->bindParam(':title', $title);
    $statement->bindParam(':user_id', $id);

    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
};

redirect('/lists.php');
