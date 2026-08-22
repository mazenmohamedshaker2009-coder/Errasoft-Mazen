<?php

function validate($data)
{
$json = file_get_contents( __DIR__ . '/../data/users.json');
$users = json_decode($json, true);

    if (empty($data['user_name'])) {
        $_SESSION['error'] = "you have a problem in the name";
        return false;
    }

    if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "you have problem in the mail input";
     return false;
    }

    if (empty($data['phone']) || !ctype_digit($data['phone']) || strlen($data['phone']) > 12) {
    $_SESSION['error'] = "you have a problem in the phone input";    
    return false;
    }

  foreach ($users as $user) {
        if ($data['user_name'] == $user['user_name']) {
        $_SESSION['error'] = "this name is already in use";    
        return false;}
        if ($data['email'] == $user['email']) {
        $_SESSION['error'] = "this email is already in use";    
        return false;}
    if ($data['phone'] == $user['phone']) {
        $_SESSION['error'] = "this phone is already in use";    
        return false;}
    }


    return true;
}
?>
