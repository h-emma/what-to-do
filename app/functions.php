<?php

declare(strict_types=1);

// Function that make rediraction path
function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}
// Functions for when user is logged in
function isUserLoggedIn(): bool
{
    $loggedIn = isset($_SESSION['user']);
    return $loggedIn;
}
// Function that get the lists
function getLists(int $id, PDO $database): array
{
    $statement = $database->query('SELECT * FROM lists WHERE user_id = :user_id;');
    $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
    $statement->execute();
    $lists = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $lists;
}

// Function that get the list
function getList(int $id, int $listId, PDO $database): array
{
    $statement = $database->query('SELECT * FROM lists WHERE user_id = :user_id AND id = :id;');
    $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
    $statement->bindParam(':id', $listId, PDO::PARAM_INT);
    $statement->execute();
    $list = $statement->fetch(PDO::FETCH_ASSOC);
    return $list;
}
// Function that get all tasks
function getAllTasks(int $id, PDO $database): array
{
    $statement = $database->query('SELECT * FROM tasks WHERE user_id = :user_id;');
    $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
    $statement->execute();
    $allTasks = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $allTasks;
}
// Funciton that get tasks in the list
function getTasksInList(int $id, PDO $database): array
{
    $statement = $database->query('SELECT * FROM tasks WHERE user_id = :user_id AND list_id = :list_id;');
    $statement->bindParam(':list_id', $_GET['list-page'], PDO::PARAM_INT);
    $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
    $statement->execute();
    $listTasks = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $listTasks;
}
// Function that get list where task is in
function getListTaskIsIn(int $taskId, PDO $database): array
{
    $statement = $database->prepare('SELECT lists.id, lists.title FROM tasks INNER JOIN lists ON tasks.list_id = lists.id WHERE tasks.id = :task_id');
    $statement->bindParam(':task_id', $taskId, PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
}

// Function that get all tasks that have deadline today
function getTasksDeadlineToday(int $id, PDO $database): array
{
    $statement = $database->query('SELECT * FROM tasks WHERE user_id = :user_id');
    $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
    $statement->execute();
    $deadlineTodayTasks = $statement->fetchAll(PDO::FETCH_ASSOC);
    $deadlineTodayTasks = array_filter($deadlineTodayTasks, function ($deadlineTodayTask) {
        return $deadlineTodayTask['deadline'] === date('Y-m-d');
    });
    return $deadlineTodayTasks;
}

function checkCompleted($completed)
{

    if ($completed === 'YES') {
        return $completed = 'NO';
    } else {
        return $completed = 'YES';
    }
}
