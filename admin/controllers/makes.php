<?php
require('../../model/database.php');
require('../../model/make_db.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'get_dropdowns';
    }
}


if ($action == 'add_make') {
    $make = filter_input(INPUT_POST, "make", FILTER_SANITIZE_STRING);
    add_make($make);
    header("Location: ..");
} if ($action == 'delete_make') {
    $makeID = filter_input(INPUT_POST, 'makeID', FILTER_VALIDATE_INT);
    delete_make($makeID);
    header("Location: ..");
}