<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['email'], $_POST['password'])) {
    $email = trim($_POST['email']);
    $id = $_SESSION['user']['id'];


    $statement = $database->prepare('UPDATE users SET email = :email, WHERE id = :id');

    $statement->bindParam(':email', $email);
    $statement->bindParam(':id', $id);

    $statement->execute();
};

if (isset($_POST['password'])) {
    $passwordHach = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $id = $_SESSION['user']['id'];

    $statement = $database->prepare('UPDATE users SET password = :password, WHERE id = :id');

    $statement->bindParam(':email', $email);
    $statement->bindParam(':id', $id);

    $statement->execute();
}

redirect('/');
