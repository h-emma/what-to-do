<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['email'], $_POST['password'])) {
    $email = trim($_POST['email']);
    $passwordHach = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $id = $_SESSION['user']['id'];

    if (isset($_FILES['avatar'])) {
        $avatar = $_FILES['avatar'];

        $avatar['name'] = date('Y-m-d') . '-' . $avatar['name'];
        $direction = __DIR__ . '/avatar-uploads/' . $avatar['name'];

        if ($avatar['type'] !== 'image/png') {
            echo 'The image file needs to be an .png, please choose an another format';
        } elseif ($avatar['size'] >= 2097152) {
            echo 'The image are to big, max size is 2MB';
        } else {
            move_uploaded_file($avatar['tmp_name'], $direction);
        };
    };
    $avatarPath = '/app/users/avatar-uploads/' . $avatar['name'];

    $statement = $database->prepare('UPDATE users SET email = :email, password = :password, avatar_image = :avatar_image WHERE id = :id');

    $statement->bindParam(':email', $email);
    $statement->bindParam(':password', $passwordHach);
    $statement->bindParam(':avatar_image', $avatarPath);
    $statement->bindParam(':id', $id);

    $statement->execute();
};

redirect('/');
