<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$usersJson = DATA_PATH . "users.json";


function register($data)
{
    global $usersJson;

    $content = file_get_contents($usersJson);

    $users = json_decode($content, true);

    $users[] = [
        'user_name' => $data['user_name'],
        'email' => $data['email'],
        'password' => password_hash($data['password'], PASSWORD_DEFAULT)
    ];

    file_put_contents(
        $usersJson,
        json_encode($users, JSON_PRETTY_PRINT)
    );

    $_SESSION['logedin'] = true;

    return true;
}

function login($data)
{
    global $usersJson;

    $error = [
        "type" => "danger",
        "title" => "Invalid Login",
        "message" => "The username or password is incorrect."
    ];

    if (!file_exists($usersJson)) {

        $_SESSION['error']['user_name'] = $error;

        return false;
    }

    $content = file_get_contents($usersJson);

    if ($content === false || trim($content) === '') {

        $_SESSION['error']['user_name'] = $error;

        return false;
    }

    $users = json_decode($content, true);

    if (!is_array($users) || empty($users)) {

        $_SESSION['error']['user_name'] = $error;

        return false;
    }

    foreach ($users as $user) {

        if (
            isset($user['user_name'], $user['password']) &&
            $user['user_name'] === $data['user_name']
        ) {

            if (password_verify($data['password'], $user['password'])) {

                $_SESSION['logedin'] = true;

                return true;
            }

            $_SESSION['error']['user_name'] = $error;

            return false;
        }
    }

    $_SESSION['error']['user_name'] = $error;

    return false;
}


function logout()
{
    unset($_SESSION['logedin']);

    session_destroy();

    return true;
}
