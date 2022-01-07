<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['title'])) {
    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $userId = $_SESSION['user']['id'];
    $listId = ($_POST['list-id']);

    $statement = $database->prepare('UPDATE lists SET title = :title WHERE id = :id AND user_id = :user_id');

    $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':id', $listId, PDO::PARAM_INT);

    $statement->execute();
    redirect("../../list.php?list-page=$listId&list-name=$title");
};
