<?php
session_start();
require('../../model/database.php');
require('../../model/admin_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_admin_menu';
    }
}

/*
if (!isset($_SESSION['is_valid_admin'])) {
    $action = 'login';
}
*/

if ($action == 'register') {
    require('../util/valid_register.php');
    $username = filter_input(INPUT_GET, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_GET, 'password', FILTER_SANITIZE_STRING);
    $confirm_password = filter_input(INPUT_GET, 'confirm_password', FILTER_SANITIZE_STRING);

    $errors = valid_registration($username, $password, $confirm_password);

    if (!empty($errors)) {
        include('view/register.php');
    } else {
        add_admin($username, $password);

        session_start();
        $_SESSION['admin'] = $is_valid_admin;
        $is_valid_admin = $_SESSION['admin'];

        header("Location: /view/admin_list.php");
    }
} else if ($action == 'login') {
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    if (is_valid_admin_login($username, $password)) {
        $_SESSION['is_valid_admin'] = true;
        include('view/admin_list.php');
    } else {
        $login_message = 'You must login to view this page.';
    }
    include('view/login.php');
}
