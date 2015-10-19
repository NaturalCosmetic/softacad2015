<?php
session_start();

require_once('include/connection.php');
require_once('include/functions.php');

if (!isset($_SESSION['user']['id'])) {
    die('User is missing');
}

$data = $_POST;
$data['user_id'] = $_SESSION['user']['id']; // users.id
// user_id, name, price, quantity

if (addProduct($data) != false) {
    echo 'You have added one item <a href="add_product.php">Go back</a>';
} else {
    echo 'You have failed my son';
}
