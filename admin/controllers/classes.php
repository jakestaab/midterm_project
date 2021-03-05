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
    if ($classID) {
        try {
            delete_class($classID);
        } catch (PDOException $e) {
            $e = "You cannot delete a class if vehicles are attached to that class.";
            include('../view/error.php');
            exit();
        }
        header("Location: ..");
    }
    header("Location: ..");
}