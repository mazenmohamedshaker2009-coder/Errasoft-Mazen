<?php

require __DIR__ . '/../core/validation/task.php';
require __DIR__ . '/../core/functions/task.php';


function storeTask()
{
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    include './views/errors/405.php';
    exit;
}


    $errors = storeValidate($_POST);

    if (!empty($errors)) {
        include './views/tasks/index.php';
        exit;
    }

    store($_POST);
}


function updateTask()
{
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    include './views/errors/405.php';
    exit;
}


    $errors = updateValidate($_POST);

    if (!empty($errors)) {
        include './views/tasks/index.php';
        exit;
    }

    update($_POST);
}

function indexTask()
{
return index();
}


function editTask($id)
{
    return edit($id);
}


function destroyTask($id)
{
    return destroy($id);
}
