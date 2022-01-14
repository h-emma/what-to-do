<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['delete_user'])) {
    $id = $_POST['delete_user'];

    $statement = $database->prepare('SELECT * FROM users WHERE id = :id');
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if (password_verify($_POST['password'], $user['password'])) {
        $statement = $database->prepare('DELETE FROM tasks WHERE user_id = :id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $statement = $database->prepare('DELETE FROM lists WHERE user_id = :id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $statement = $database->prepare('DELETE FROM users WHERE id = :id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        unset($_SESSION['user']);
        $_SESSION['delete_completed'][] = 'Your profile has now been deleted';

        redirect('/');
    }
    $_SESSION['delete_error'][] = 'Ooops something went wrong....';
    redirect('/settings.php');
};
