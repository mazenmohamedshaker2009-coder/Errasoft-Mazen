<?php

session_start();

require_once __DIR__ . '/../core/functions.php';
require_once __DIR__ . '/../core/validation.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

if (!validate($_POST)) {
    header('Location: ../view/main/contact.php');
    exit;
}


if (store($_POST)) {
    header('Location: ../view/main/contact.php');
    exit;
}

header('Location: ../index.php');
exit;
