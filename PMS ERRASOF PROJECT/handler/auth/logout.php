<?php

require_once dirname(__FILE__, 3) . "/config/config.php";
require_once BASE_PATH . "core/function/auth.php";

var_dump("handler started");

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {

    var_dump("method is not GET");

    http_response_code(405);
    require_once BASE_PATH . 'views/errors/405.php';
    exit;
}

var_dump("GET received");

if (!empty($_GET) || !empty($_POST)) {

    var_dump("unexpected input data");

    http_response_code(400);
    require_once BASE_PATH . 'views/errors/400.php';
    exit;
}

var_dump("no unexpected input data");

if (!isset($_SESSION['logedin']) || $_SESSION['logedin'] !== true) {

    var_dump("user not logged in");

    header(
        'Location: ' .
        BASE_URL . 'index.php'
    );

    exit;
}

var_dump("user logged in");

$result = logout();

var_dump($result);

if ($result) {

    var_dump("logout success");

    header(
        'Location: ' .
        BASE_URL . 'index.php'
    );

    exit;
}

var_dump("logout failed");

http_response_code(500);
require_once BASE_PATH . 'views/errors/500.php';
exit;
