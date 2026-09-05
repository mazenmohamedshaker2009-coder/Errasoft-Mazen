<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


function validateRegister($data)
{
    $error = [];

    $user_name = $data['user_name'] ?? '';
    $email = $data['email'] ?? '';
    $password = $data['password'] ?? '';
    $password_confirm = $data['password_confirme'] ?? '';


    // Users Data

    $content = file_get_contents(DATA_PATH . 'users.json');

    $users = json_decode($content, true);


    // User Name

    if (empty($user_name)) {

        $error['user_name'] = [
            "type" => "danger",
            "title" => "Error",
            "message" => "The name input is required."
        ];

    } elseif (!preg_match('/^[a-zA-Z]+$/', $user_name)) {

        $error['user_name'] = [
            "type" => "danger",
            "title" => "Invalid Username",
            "message" => "Username must contain letters only."
        ];

    } else {

        foreach ($users as $user) {

            if ($user['user_name'] === $user_name) {

                $error['user_name'] = [
                    "type" => "danger",
                    "title" => "Username Already Exists",
                    "message" => "This username is already registered."
                ];

                break;
            }
        }
    }


    // Email

    if (empty($email)) {

        $error['email'] = [
            "type" => "danger",
            "title" => "Error",
            "message" => "The email input is required."
        ];

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $error['email'] = [
            "type" => "danger",
            "title" => "Invalid Email",
            "message" => "Please enter a valid email address."
        ];

    } else {

        foreach ($users as $user) {

            if ($user['email'] === $email) {

                $error['email'] = [
                    "type" => "danger",
                    "title" => "Email Already Exists",
                    "message" => "This email is already registered."
                ];

                break;
            }
        }
    }


    // Password

    if (empty($password)) {

        $error['password'] = [
            "type" => "danger",
            "title" => "Error",
            "message" => "Password input must be filled."
        ];

    } else {

        if (strlen($password) < 8) {

            $error['password'] = [
                "type" => "danger",
                "title" => "Invalid Password",
                "message" => "Password must be at least 8 characters."
            ];
        }

        if (!preg_match('/[A-Z]/', $password)) {

            $error['password'] = [
                "type" => "danger",
                "title" => "Invalid Password",
                "message" => "Password must contain at least one uppercase letter."
            ];
        }

        if (!preg_match('/[a-z]/', $password)) {

            $error['password'] = [
                "type" => "danger",
                "title" => "Invalid Password",
                "message" => "Password must contain at least one lowercase letter."
            ];
        }

        if (preg_match_all('/[0-9]/', $password) < 2) {

            $error['password'] = [
                "type" => "danger",
                "title" => "Invalid Password",
                "message" => "Password must contain at least two numbers."
            ];
        }

        if (!preg_match('/[^A-Za-z0-9]/', $password)) {

            $error['password'] = [
                "type" => "danger",
                "title" => "Invalid Password",
                "message" => "Password must contain at least one special character."
            ];
        }
    }


    // Password Confirmation

    if (empty($password_confirm)) {

        $error['password_confirme'] = [
            "type" => "danger",
            "title" => "Error",
            "message" => "Password must be confirmed."
        ];

    } elseif ($password !== $password_confirm) {

        $error['password_confirme'] = [
            "type" => "danger",
            "title" => "Password Mismatch",
            "message" => "Password confirmation does not match the password."
        ];
    }


    return $error;
}


function validateLogin($data)
{
    $error = [];

    $user_name = $data['user_name'] ?? '';
    $password = $data['password'] ?? '';

    if (empty($user_name)) {

        $error['user_name'] = [
            "type" => "danger",
            "title" => "Error",
            "message" => "The name input is required."
        ];

    } elseif (!preg_match('/^[a-zA-Z]+$/', $user_name)) {

        $error['user_name'] = [
            "type" => "danger",
            "title" => "Invalid Username",
            "message" => "Username must contain letters only."
        ];

    } elseif (empty($password)) {

        $error['password'] = [
            "type" => "danger",
            "title" => "Error",
            "message" => "Password input must be filled."
        ];

    }

    return $error;
}
