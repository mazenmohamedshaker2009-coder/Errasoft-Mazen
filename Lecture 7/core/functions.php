<?php

function store($data)
{

$json = file_get_contents(__DIR__ . '/../data/users.json');
$users = json_decode($json, true);

    $user = [
        "user_name" => $data['user_name'],
        "email" => $data['email'],
        "phone" => $data['phone'],
        "message" => $data['message'],
    ];


$users[] = $user;     

$json = json_encode($users, JSON_PRETTY_PRINT);
file_put_contents(__DIR__ . '/../data/users.json', $json);
  
  return true;
}
