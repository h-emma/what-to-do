<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$id = $_POST['delete-list'];

$statement = $database->prepare('DELETE FROM lists WHERE id = :id;');

$statement->bindParam(':id', $id, PDO::PARAM_INT);

$statement->execute();


redirect('/lists.php');
