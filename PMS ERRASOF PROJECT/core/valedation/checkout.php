<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


function validateCheckout($data)
{
    $error = [];

    $name = $data['name'] ?? '';
    $email = $data['email'] ?? '';
    $address = $data['address'] ?? '';
    $phone = $data['phone'] ?? '';
    $notes = $data['notes'] ?? '';


    // Name

    if (empty($name)) {

        $error['name'] = [
            "type" => "danger",
            "title" => "Error",
            "message" => "The name input is required."
        ];

    } elseif (!preg_match('/^[a-zA-Z]+$/', $name)) {

        $error['name'] = [
            "type" => "danger",
            "title" => "Invalid Name",
            "message" => "Name must contain letters only."
        ];
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
    }


    // Address

    if (empty($address)) {

        $error['address'] = [
            "type" => "danger",
            "title" => "Error",
            "message" => "The address input is required."
        ];
    }


    // Phone

    if (empty($phone)) {

        $error['phone'] = [
            "type" => "danger",
            "title" => "Error",
            "message" => "The phone input is required."
        ];

    } elseif (!preg_match('/^[0-9]+$/', $phone)) {

        $error['phone'] = [
            "type" => "danger",
            "title" => "Invalid Phone",
            "message" => "Phone must contain numbers only."
        ];
    }


    // Notes

    if (empty($notes)) {

        $error['notes'] = [
            "type" => "danger",
            "title" => "Error",
            "message" => "The notes input is required."
        ];
    }


    return $error;
}
