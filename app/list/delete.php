<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$id = $_POST['delete-list'];

$statement = $database->prepare('DELETE FROM lists WHERE id = :id;');

$statement->bindParam(':id', $id);

$statement->execute();


redirect('/lists.php');
