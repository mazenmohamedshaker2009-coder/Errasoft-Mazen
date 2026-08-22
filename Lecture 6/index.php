<?php
session_start();

include_once './inc/header.php';
include_once './inc/nav.php';
?>

<h1>Hello, <?= $_SESSION['user_name'] ?? "Gust" ?></h1>

<?php include_once './inc/footer.php'; ?>
