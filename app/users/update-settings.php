<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['email'])) {
    $email = trim($_POST['email']);
    $id = $_SESSION['user']['id'];

    $statement = $database->prepare('UPDATE users SET email = :email WHERE id = :id');

    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);

    $statement->execute();
};

if (isset($_POST['password'])) {
    $passwordHach = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $id = $_SESSION['user']['id'];

    $statement = $database->prepare('UPDATE users SET password = :password WHERE id = :id');

    $statement->bindParam(':password', $passwordHach, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);

    $statement->execute();
}

redirect('/settings.php');
