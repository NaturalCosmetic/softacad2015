<?php

function headerMenu() {
    return array();
    global $connection;

    $result = mysqli_query($connection, 'SELECT * FROM `menu`');
    $menu = array();

    while($row = mysqli_fetch_assoc($result)) {
        $menu[] = $row;
    }

    return $menu;
}

function login($email, $password) {
    global $connection;

    $sql = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password' LIMIT 1";
    $result = mysqli_query($connection, $sql);

    $user = mysqli_fetch_assoc($result);

    if ($user != null) {
        $_SESSION['user'] = $user;

        return true;
    } else {
        return false;
    }
}

function loggedIn() {
    return isset($_SESSION['user']); // true | false
}