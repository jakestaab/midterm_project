<?php
require('../model/database.php');
require('../model/inventory_db.php');
require('../model/make_db.php');
require('../model/type_db.php');
require('../model/class_db.php');
require('../model/admin_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_inventory';
    }
}

if (!isset($_SESSION['is_valid_admin'])) {
    $action = 'login';
}

if ($action == 'list_inventory') {
    $price_or_year = filter_input(INPUT_GET, 'price_or_year', FILTER_VALIDATE_INT);

    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
    $makes = get_makes();

    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
    $types = get_types();

    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
    $classes = get_class_name();

    $vehicles = get_vehicles($price_or_year, $make_id, $type_id, $class_id);
    include('view/admin_list.php');
} else if ($action == 'order_by') { //order_by
    $price_or_year = filter_input(INPUT_GET, 'price_or_year', FILTER_VALIDATE_INT);
    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
    header("Location: ?price_or_year=$price_or_year&make_id=$make_id&type_id=$type_id&class_id=$class_id");
} else if ($action == 'show_add_vehicle_form') {
    $makes = get_makes();
    $types = get_types();
    $classes = get_class_name();
    include('./view/add_vehicle.php');
} else if ($action == 'show_add_make_form') {
    $makes = get_makes();
    include ('./view/add_make.php');
} else if ($action == 'show_add_type_form') {
    $types = get_types();
    include ('./view/add_type.php');
} else if ($action == 'show_add_class_form') {
    $classes = get_class_name();
    include('./view/add_class.php');
} else if ($action == 'login' || $action == 'show_login' || $action == 'register'
            || $action = 'show_register' || $action == 'logout') {
    header("Location: controllers/administrators.php");
}