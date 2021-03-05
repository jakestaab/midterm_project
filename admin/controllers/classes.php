<?php
require('../../model/database.php');
require('../../model/class_db.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'get_dropdowns';
    }
}


if ($action == 'add_class') {
    $class = filter_input(INPUT_POST, "class", FILTER_SANITIZE_STRING);
    add_class($class);
    header("Location: ..");
} if ($action == 'delete_class') {
    $classID = filter_input(INPUT_POST, 'classID', FILTER_VALIDATE_INT);
    delete_class($classID);
    header("Location: ..");
}