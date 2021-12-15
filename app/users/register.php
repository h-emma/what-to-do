<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $email = trim($_POST['email']);
    $passwordHach = password_hash($_POST['password'], PASSWORD_DEFAULT);

    //Här är något som inte funkar!
    $statement = $database->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');
    $statement->bindParam(':username', $username);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':password', $passwordHach);

    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
}
// In this file we register a new user.

redirect('/login.php');
