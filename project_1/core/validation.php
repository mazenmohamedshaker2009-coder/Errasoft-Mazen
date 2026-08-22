<?php

function validateLogin($data)
{


$json = file_get_contents(__DIR__ . '/../data/main.json');
$users = json_decode($json, true);


    if (empty($data['user_name'])) {
        $_SESSION['last_error'] = "user name input must be full"; 
        return false;
    }

    if (empty($data['password'])) {
        $_SESSION['last_error'] = "password input must be full";
        return false;
    }

    return true;
}


function validateRegister($data)
{

    
$json = file_get_contents( __DIR__ . '/../data/main.json');
$users = json_decode($json, true);



    if (empty($data['user_name'])) {
        return false;
        $_SESSION['last_error'] = "user name input must be full";
    }

    if (empty($data['email']) ) {
    $_SESSION['last_error'] = "email input must be full";
    return false;
    }

    if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
    $_SESSION['last_error'] = "email must be example@example.com ";
    return false;
    }

    if (empty($data['password'])) {
        $_SESSION['last_error'] = "password input must be full";
        return false;
    }
    foreach ($users as $user) {
        if ($data['user_name'] == $user['user_name']) {
        $_SESSION['last_error'] = "user name must be uniq";
        return false;}
        if ($data['email'] == $user['email']) {
        $_SESSION['last_error'] = "email must be uniq";
        return false;}
    }

    return true;
}
