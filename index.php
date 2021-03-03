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
    $price_or_year = filter_input(INPUT_GET, 'price_or_year', FILTER_VALIDATE_INT);
    $vehicles = get_vehicles($price_or_year);
    include('view/customer_list.php');
} else if ($action == 'order_by') { //select_category
    $price_or_year = filter_input(INPUT_GET, 'price_or_year', FILTER_VALIDATE_INT);
    header("Location: ?price_or_year=$price_or_year");
}