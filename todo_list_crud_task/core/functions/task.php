<?php

function store($data)
{
    $title = trim($data['title'] ?? '');
    $conn = $GLOBALS['conn'];

    if ($conn) {

        $sql = "INSERT INTO tasks (title) VALUES ('$title')";
        mysqli_query($conn, $sql);

        $_SESSION['massage'] = [
            'title' => 'Success',
            'type' => 'success',
            'massage' => 'Task added successfully'
        ];

        return header("Location: index.php?page=home");
    }
}


function index()
{
    $conn = $GLOBALS['conn'];

    if ($conn) {
        $sql = "SELECT * FROM tasks";
        $result = mysqli_query($conn, $sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    return [];
}


function edit($id)
{
    $conn = $GLOBALS['conn'];

    if ($conn) {
        $sql = "SELECT * FROM tasks WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        return mysqli_fetch_assoc($result);
    }

    return [];
}



function update($data)
{
    $title = trim($data['title'] ?? '');
    $id = $data['id'];
    $conn = $GLOBALS['conn'];

    if ($conn) {

        $sql = "UPDATE tasks SET title = '$title' WHERE id = $id";
        mysqli_query($conn, $sql);

        $_SESSION['massage'] = [
            'title' => 'Success',
            'type' => 'success',
            'massage' => 'Task updated successfully'
        ];

        return header("Location: index.php?page=home");
    }
}


function destroy($id)
{
    $conn = $GLOBALS['conn'];

    if ($conn) {

        $sql = "DELETE FROM tasks WHERE id = $id";
        mysqli_query($conn, $sql);

        $_SESSION['massage'] = [
            'title' => 'Success',
            'type' => 'success',
            'massage' => 'Task deleted successfully'
        ];

        return header("Location: index.php?page=home");
    }
}
