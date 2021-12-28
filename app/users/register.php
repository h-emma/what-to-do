<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';
// register username, email and password for the user
if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $passwordHach = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //add avatar image for the users profile
    if (isset($_FILES['avatar'])) {
        $avatar = $_FILES['avatar'];

        $avatar['name'] = ['username'] . '-' . $avatar['name'];
        $direction = __DIR__ . '/uploads/' . $avatar['name'];


        //add message if there something wrong with the uploading
        if ($avatar['type'] !== 'image/png') {
            echo 'The image file needs to be an .jpg, .jpeg or .png, please choose an another format';
        } elseif ($avatar['size'] >= 2097152) {
            echo 'The image are to big, max size is 2MB';
        } else {
            move_uploaded_file($avatar['tmp_name'], $direction);
        };
    };
    $avatarPath = '/uploads/' . $avatar['name'];

    $statement = $database->prepare('INSERT INTO users (username, email, password, avatar_image) VALUES (:username, :email, :password, :avatar_image)');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':password', $passwordHach, PDO::PARAM_STR);
    $statement->bindParam(':avatar_image', $avatarPath, PDO::PARAM_STR);

    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
};

redirect('/');
