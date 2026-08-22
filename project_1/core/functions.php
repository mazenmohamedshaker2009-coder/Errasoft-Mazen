<?php


function login($data)
{

$json = file_get_contents(__DIR__ . '/../data/main.json');
$users = json_decode($json, true);


    foreach ($users as $user) {

        if (
            $data['user_name'] === $user['user_name'] &&
            $data['password'] === $user['password']
        ) {
            $_SESSION['user_name'] = $user['user_name'];
            $_SESSION['logedIn'] = true;

            return true;
        }
    }
    $_SESSION['last_error'] = "your data is wrong";
    return false;
}


function register($data)
{

$json = file_get_contents(__DIR__ . '/../data/main.json');
$users = json_decode($json, true);

    $user = [

        "user_name" => $data['user_name'],
        "password" => $data['password'],
        "email" => $data['email']
    ];


$users[] = $user;     

$json = json_encode($users, JSON_PRETTY_PRINT);
file_put_contents(__DIR__ . '/../data/main.json', $json);

$_SESSION['user_name'] = $user['user_name'];
$_SESSION['logedIn'] = true;

return true;
}


function logout(){
session_unset();
session_destroy();

return true;
}

