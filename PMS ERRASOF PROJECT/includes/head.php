<?php

declare(strict_types=1);

$pageTitle = $pageTitle ?? 'EraaSoft PMS';
$pageDescription = $pageDescription ?? 'EraaSoft PMS';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    >

    <meta
        name="description"
        content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>"
    >

    <meta
        name="author"
        content="EraaSoft PMS"
    >

    <title>
        <?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>
    </title>

    <!-- Favicon -->
    <link
        rel="icon"
        type="image/x-icon"
        href="<?=BASE_URL.'assets/icons/favicon.ico'?>"
    >

    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <!-- Bootstrap / Core CSS -->
    <link
    href="<?=BASE_URL.'assets/css/styles.css'?>"
    rel="stylesheet"
    >
    
    
</head>

<body>
