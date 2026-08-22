<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
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

if (!validateRegister($_POST)) {
    header('Location: ../view/auth/register.php');
    exit;
}

if (register($_POST)) {
    header('Location: ../index.php');
    exit;
}

header('Location: ../view/auth/register.php');
exit;

?>
