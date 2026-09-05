<?php

require_once dirname(__FILE__, 3) . "/config/config.php";
require_once BASE_PATH . "core/valedation/auth.php";
require_once BASE_PATH . "core/function/auth.php";

var_dump("handler started");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    var_dump("method is not POST");

    require_once BASE_PATH . 'views/errors/405.php';
    exit;
}

var_dump("POST received");

$errors = validateLogin($_POST);

var_dump($errors);

if (!empty($errors)) {

    var_dump("validation failed");

    $_SESSION['error'] = $errors;

    header(
        'Location: ' .
        BASE_URL . 'views/auth/login.php'
    );

    exit;
}

var_dump("validation passed");

$result = login($_POST);

var_dump($result);

if ($result) {

    var_dump("login success");

    header(
        'Location: ' .
        BASE_URL . 'index.php'
    );

    exit;
}

var_dump("login failed");

header(
    'Location: ' .
    BASE_URL . 'views/auth/login.php'
);

exit;
