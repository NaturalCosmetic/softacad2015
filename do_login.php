<?php
session_start();

require_once('include/connection.php');
require_once('include/functions.php');

$fields = array('email', 'password');

$valid = true;

foreach ($fields as $field) {
    if (!array_key_exists($field, $_POST)) {
        $valid = false;
    }
}

if ($valid === true) {
    $isLoggedIn = login($_POST['email'], sha1($_POST['password']));

    if ($isLoggedIn === true) {
        header('Location: account.php');
        exit;
    } else {
        header('Location: login.php');
        exit;
    }
}