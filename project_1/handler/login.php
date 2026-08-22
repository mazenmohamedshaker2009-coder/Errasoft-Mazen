<?php

session_start();

require_once __DIR__ . '/../core/functions.php';
require_once __DIR__ . '/../core/validation.php';


if (isset($_SESSION['logedIn'])) {
    header('Location: ../view/errors/403.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../view/errors/403.php');
    exit;
}

if (!validateLogin($_POST)) {
    header('Location: ../view/auth/login.php');
    exit;
}

if (login($_POST)) {
    header('Location: ../index.php');
    exit;
}

header('Location: ../view/auth/login.php');
exit;
