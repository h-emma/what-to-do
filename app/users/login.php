<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// Check if both email and password exists in the POST request.
if (isset($_POST['email'], $_POST['password'])) {
    $email = trim(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));

    // Prepare, bind email parameter and execute the database query.
    $statement = $database->prepare('SELECT * FROM users WHERE email = :email');
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();

    // Fetch the user as an associative array.
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    // If we couldn't find the user in the database, redirect back to the login
    // page with our custom redirect function.
    if (!$user) {
        redirect('login.php');
    }
    $passmatch = password_verify($_POST['password'], $user['password']);

    if ($passmatch) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'avatar_image' => $user['avatar_image']
        ];
    }
}

redirect('../../index.php');
