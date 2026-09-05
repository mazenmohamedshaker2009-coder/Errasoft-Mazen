<?php

require_once dirname(__FILE__, 3) . "/config/config.php";
require_once BASE_PATH . "core/function/product.php";


if ($_SERVER['REQUEST_METHOD'] !== 'GET') {


    require_once BASE_PATH . 'views/errors/405.php';
    exit;
}


$id = $_GET['id'] ?? '';


if (empty($id)) {

    require_once BASE_PATH . 'views/errors/404.php';
    exit;
}


$result = destroy($id);


if ($result) {


    header(
        'Location: ' .
        BASE_URL . 'views/product/product-table.php'
    );

    exit;
}


require_once BASE_PATH . 'views/errors/404.php';
exit;
