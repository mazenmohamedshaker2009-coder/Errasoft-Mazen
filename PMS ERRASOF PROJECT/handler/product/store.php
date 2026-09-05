<?php

require_once dirname(__FILE__, 3) . "/config/config.php";
require_once BASE_PATH . "core/valedation/product.php";
require_once BASE_PATH . "core/function/product.php";


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {


    require_once BASE_PATH . 'views/errors/405.php';
    exit;
}


$errors = validateStore($_POST, $_FILES);

if (!empty($errors)) {

    $_SESSION['error'] = $errors;

    header(
        'Location: ' .
        BASE_URL . 'views/product/product-create.php'
    );

    exit;
}


$result = store($_POST, $_FILES);


if ($result) {


    header(
        'Location: ' .
        BASE_URL . 'index.php'
    );

    exit;
}


require_once BASE_PATH . 'views/errors/404.php';
exit;
