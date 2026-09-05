<?php

session_start();
$projectRoot = realpath(dirname(__DIR__));
define("BASE_PATH", dirname(__DIR__) . DIRECTORY_SEPARATOR);
define("DATA_PATH", BASE_PATH . DIRECTORY_SEPARATOR . "data". DIRECTORY_SEPARATOR);
define("UPLOAD_PATH", BASE_PATH . DIRECTORY_SEPARATOR . "uploads". DIRECTORY_SEPARATOR);
define(
    'BASE_URL',
    'http://' . $_SERVER['HTTP_HOST'] .
    str_replace(
        DIRECTORY_SEPARATOR,
        '/',
        str_replace(
            realpath($_SERVER['DOCUMENT_ROOT']),
            '',
            $projectRoot
        )
    ) . '/'
);
