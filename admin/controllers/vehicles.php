<?php
require('../../model/database.php');
require('../../model/inventory_db.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'get_dropdowns';
    }
}


if ($action == 'add_vehicle') {
    $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
    $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
    $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
    $year = filter_input(INPUT_POST, "year", FILTER_SANITIZE_STRING);
    $model = filter_input(INPUT_POST, "model", FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_STRING);

    add_vehicle($year, $model, $price, $type_id, $class_id, $make_id);
    header("Location: ..");
}