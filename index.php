<?php

require_once 'init.php';

if (!$user || !check_user_id($con, $user['id'])) {
    header('Location: quest.php');
    exit();
}

$user_id = $user['id'];

$project_id = filter_input(INPUT_GET, 'project_id');

if ($project_id && !check_project_id($con, $project_id)) {
    show_error('Такой проект не существует');
}

// $filter = filter_input(INPUT_GET, 'date');

$task_id = filter_input(INPUT_GET, 'task_id', FILTER_SANITIZE_NUMBER_INT);
$task_check = filter_input(INPUT_GET, 'check', FILTER_SANITIZE_NUMBER_INT);
$show_complete_tasks = filter_input(INPUT_GET, 'show_completed', FILTER_SANITIZE_NUMBER_INT);
$search = trim(filter_input(INPUT_GET, 'search')) ?? '';

if ($task_id && check_task_id($con, $task_id)) {
    if ($task_check) {
        complete_task($con, $task_id);
    } else {
        remove_complete_task($con, $task_id);
    }
}

$tasks = get_user_tasks($con, $user_id, $project_id);
$projects = get_projects($con, $user_id);

if ($show_complete_tasks) {
    $tasks = get_complete_tasks($con, $user_id, $project_id = null);
}

if ($search) {
    $tasks = get_search_results($con, $search);
}

$content = include_template('main.php', [
    'projects' => $projects,
    'project_id' => $project_id,
    'tasks' => $tasks ?? null,
    'search' => $search,
    'show_complete_tasks' => $show_complete_tasks,
    'is_complete' => $is_complete ?? null
]);

$layout = include_template('layout.php', [
    'page_title' => 'Дела в порядке',
    'user' => $user,
    'content' => $content
]);

print($layout);
