<?php

declare(strict_types=1);
// Function that make rediraction path
function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}
// Function that get the lists
function getLists($id, $database)
{
    $statement = $database->query('SELECT * FROM lists WHERE user_id = :user_id;');
    $statement->bindParam(':user_id', $id);
    $statement->execute();
    $lists = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $lists;
}
// Funciton that get tasks in the list
function getTasksInList($id, $database)
{
    $statement = $database->query('SELECT * FROM tasks WHERE user_id = :user_id;');
    $statement->bindParam(':user_id', $id);
    $statement->execute();
    $listTasks = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $listTasks;
}
// Function that get all tasks that have deadline today
function getTasksDeadlineToday($id, $database)
{
    $statement = $database->query('SELECT * FROM tasks WHERE deadline = CURDATE();');
    $statement->bindParam('CURDATE()', $id);
    $statement->execute();
    $deadlineTodayTasks = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $deadlineTodayTasks;
}
