<?php

require_once dirname(__FILE__, 3) . "/config/config.php";
require_once BASE_PATH . "core/valedation/auth.php";
require_once BASE_PATH . "core/function/auth.php";

var_dump("handler started");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    var_dump("method is not POST");

    http_response_code(405);
    require_once BASE_PATH . 'views/errors/405.php';
    exit;
}

var_dump("POST received");

$errors = validateRegister($_POST);

var_dump($errors);

if (!empty($errors)) {

    var_dump("validation failed");

    $_SESSION['error'] = $errors;

    header(
        'Location: ' .
        BASE_URL . 'views/auth/register.php'
    );

    exit;
}

var_dump("validation passed");

$result = register($_POST);

var_dump($result);

if ($result) {

    var_dump("register success");

    header(
        'Location: ' .
        BASE_URL . 'index.php'
    );

    exit;
}

var_dump("register failed");

http_response_code(500);
require_once BASE_PATH . 'views/errors/500.php';
exit;
