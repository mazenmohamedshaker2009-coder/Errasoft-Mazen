<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
session_start();

require_once __DIR__ . '/../core/functions.php';

if ($_SESSION['logedIn'] === false) {
    header('Location: ../index.php');
    exit;
}

if (logout()) {
    header('Location: ../index.php');
    exit;
}

header('Location: ../index.php');
exit;

?>
