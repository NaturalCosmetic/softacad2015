<?php
session_start();

require_once('common/autoload.php');

$fields = array('email', 'password');

$valid = true;

foreach ($fields as $field) {
    if (!array_key_exists($field, $_POST)) {
        $valid = false;
    }
}

if ($valid === true) {
    $user = new User();
    $isLoggedIn = $user->login($_POST['email'], $_POST['password']);

    if ($isLoggedIn === true) {
        header('Location: account.php');
        exit;
    } else {
        header('Location: login.php');
        exit;
    }
}