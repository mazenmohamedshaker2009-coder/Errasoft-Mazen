<?php

function storeValidate($data)
{
    $errors = [];

    $title = trim($data['title'] ?? '');

    if ($title === '') {
        $errors['title'] = 'Title is required.';
    } elseif (strlen($title) < 3) {
        $errors['title'] = 'Title must be at least 3 characters.';
    } elseif (strlen($title) > 255) {
        $errors['title'] = 'Title must not exceed 255 characters.';
    }

    if (!empty($errors)) {
        $_SESSION['massage'] = [
            'title' => 'Validation Error',
            'type' => 'error',
            'massage' => implode(' ', $errors)
        ];
    }

    return $errors;
}



function updateValidate($data)
{
    $errors = [];

    $title = trim($data['title'] ?? '');

    if ($title === '') {
        $errors['title'] = 'Title is required.';
    } elseif (strlen($title) < 3) {
        $errors['title'] = 'Title must be at least 3 characters.';
    } elseif (strlen($title) > 255) {
        $errors['title'] = 'Title must not exceed 255 characters.';
    }

    if (!empty($errors)) {
        $_SESSION['massage'] = [
            'title' => 'Validation Error',
            'type' => 'error',
            'massage' => implode(' ', $errors)
        ];
    }

    return $errors;
}
