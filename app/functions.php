<?php

declare(strict_types=1);
// Function that make rediraction path
function redirect(string $path)
{
    header("Location: ${path}");
    exit;
};
// Functions for when user is logged in
function isUserLoggedIn()
{
    $loggedIn = isset($_SESSION['user']);
    return $loggedIn;
};
// Function that get the lists
function getLists($id, $database)
{
    $statement = $database->query('SELECT * FROM lists WHERE user_id = :user_id;');
    $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
    $statement->execute();
    $lists = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $lists;
};
// Funciton that get tasks in the list
function getTasksInList($id, $database)
{
    $statement = $database->query('SELECT * FROM tasks WHERE user_id = :user_id;');
    $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
    $statement->execute();
    $listTasks = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $listTasks;
};
// Function that get all tasks that have deadline today
function getTasksDeadlineToday($id, $database)
{

    $statement = $database->query('SELECT * FROM tasks WHERE user_id = :user_id AND deadline IS CURDATE();');
    $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
    $statement->execute();
    $deadlineTodayTasks = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $deadlineTodayTasks;
};
