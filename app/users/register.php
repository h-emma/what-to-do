<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['username'])) {
    $username = trim($_POST['username']);

    $database = new PDO('sqlite:database.db');
}
// In this file we register a new user.

redirect('/');
