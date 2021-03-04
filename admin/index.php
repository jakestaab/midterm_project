<?php
require('../model/database.php');
require('../model/inventory_db.php');
require('../model/make_db.php');
require('../model/type_db.php');
require('../model/class_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_inventory';
    }
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
} else if ($action == 'delete_vehicle') { //delete_vehicle
    $v_num = filter_input(INPUT_POST, 'v_num', FILTER_VALIDATE_INT);
    delete_vehicle($v_num);
    header("Location: .?v_num=$v_num");
}