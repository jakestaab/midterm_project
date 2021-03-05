<?php
require('../../model/database.php');
require('../../model/type_db.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'get_dropdowns';
    }
}


if ($action == 'add_type') {
    $type = filter_input(INPUT_POST, "type", FILTER_SANITIZE_STRING);
    add_type($type);
    header("Location: ..");
} if ($action == 'delete_type') {
    $typeID = filter_input(INPUT_POST, 'typeID', FILTER_VALIDATE_INT);
    if ($typeID) {
        try {
            delete_type($typeID);
        } catch (PDOException $e) {
            $e = "You cannot delete a type if vehicles are attached to that type.";
            include('../view/error.php');
            exit();
        }
        header("Location: ..");
    }
    header("Location: ..");
}