<?php
require('./model/database.php');
require('./model/inventory_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_inventory';
    }
}

if ($action == 'list_inventory') {
    $vehicles = get_vehicles_by_price();
    include('view/customer_list.php');
}