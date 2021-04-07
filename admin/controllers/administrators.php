<?php
session_start();
require('../../model/database.php');
require('../../model/inventory_db.php');
require('../../model/make_db.php');
require('../../model/type_db.php');
require('../../model/class_db.php');
require('../../model/admin_db.php');

$price_or_year = filter_input(INPUT_GET, 'price_or_year', FILTER_VALIDATE_INT);
$make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
$makes = get_makes();
$type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
$types = get_types();
$class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
$classes = get_class_name();
$vehicles = get_vehicles($price_or_year, $make_id, $type_id, $class_id);


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_inventory';
    }
}


if (!isset($_SESSION['is_valid_admin'])) {
    $action = 'login';
} else if (isset($_SESSION['is_valid_admin']) && $action == 'order_by') {
    include('../view/admin_list.php');
}


if ($action == 'register') {
    require_once('../util/valid_register.php');
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING);

    $errors = valid_registration($username, $password, $confirm_password);

    if (!empty($errors)) {
        include('../view/register.php');
    } else {
        add_admin($username, $password);

        $_SESSION['is_valid_admin'] = true;

        include('../view/admin_list.php');
    }
} else if ($action == 'show_register') {
    include('../view/register.php');
} else if ($action == 'login') {
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    if (is_valid_admin_login($username, $password)) {
        $_SESSION['is_valid_admin'] = true;
        include('../view/admin_list.php');
        //header("Location: ../index.php?action=list_inventory");
    } else {
        $login_message = 'You must login to view this page.';
        include('../view/login.php');
    }
} else if ($action == 'logout') {
    include('../view/logout.php');
} else if ($action == 'list_inventory') {
    include('../view/admin_list.php');
} else if ($action == 'show_add_vehicle_form') {
    $makes = get_makes();
    $types = get_types();
    $classes = get_class_name();
    include('../view/add_vehicle.php');
} else if ($action == 'show_add_make_form') {
    $makes = get_makes();
    include ('../view/add_make.php');
} else if ($action == 'show_add_type_form') {
    $types = get_types();
    include ('../view/add_type.php');
} else if ($action == 'show_add_class_form') {
    $classes = get_class_name();
    include('../view/add_class.php');
}