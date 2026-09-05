<?php

require_once dirname(__FILE__, 3) . "/config/config.php";
require_once BASE_PATH . "core/valedation/checkout.php";
require_once BASE_PATH . "core/function/checkout.php";


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {


    require_once BASE_PATH . 'views/errors/405.php';
    exit;
}


$errors = validateCheckout($_POST);

if (!empty($errors)) {

    $_SESSION['error'] = $errors;

    header(
        'Location: ' .
        BASE_URL . 'views/main/checkout.php'
    );

    exit;
}


$result = checkout($_POST);


if ($result) {


    header(
        'Location: ' .
        BASE_URL . 'index.php'
    );

    exit;
}


require_once BASE_PATH . 'views/errors/404.php';
exit;
