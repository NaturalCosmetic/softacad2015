<?php

require_once('include/connection.php');

$fields = array('name', 'email', 'password');

$valid = true;

foreach ($fields as $field) {
    if (!array_key_exists($field, $_POST)) {
        $valid = false;
    }
}

if ($valid === true) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    $result = mysqli_query($connection, "
                INSERT INTO `users`
                (`name`, `email`, `password`)
                VALUES
                ('$name', '$email', '$password')
    ");

    if ($result == false) {
        die(mysqli_error($connection));
    }

    header('Location: account.php');
}
