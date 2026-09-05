<?php

require_once dirname(__FILE__, 3) . "/config/config.php";
require_once BASE_PATH . "core/valedation/product.php";
require_once BASE_PATH . "core/function/product.php";


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {


    require_once BASE_PATH . 'views/errors/405.php';
    exit;
}


$id = $_POST['id'] ?? '';


if (empty($id)) {

    require_once BASE_PATH . 'views/errors/404.php';
    exit;
}


$errors = validateUpdate($_POST, $_FILES, $id);

if (!empty($errors)) {

    $_SESSION['error'] = $errors;

    header(
        'Location: ' .
        BASE_URL . 'views/product/product-edit.php?id=' . $id
    );

    exit;
}


$result = update($_POST, $_FILES, $id);


if ($result) {


    header(
        'Location: ' .
        BASE_URL . 'index.php'
    );

    exit;
}


require_once BASE_PATH . 'views/errors/404.php';
exit;
