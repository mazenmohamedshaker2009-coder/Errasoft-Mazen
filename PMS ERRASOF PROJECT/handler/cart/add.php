<?php

require_once dirname(__FILE__, 3) . "/config/config.php";
require_once BASE_PATH . "core/function/cart.php";

$redirectUrl = $_SERVER['HTTP_REFERER'] ?? (BASE_URL . 'index.php');



if ($_SERVER['REQUEST_METHOD'] !== 'GET') {

    require_once BASE_PATH . 'views/errors/405.php';
    exit;
}


$id = $_GET['id'] ?? '';
$quantity = $_GET['quantity'] ?? null;


$result = add($id, $quantity);


if ($result) {

    header('Location: ' . $redirectUrl);
    
    exit;
}


require_once BASE_PATH . 'views/errors/404.php';
exit;
