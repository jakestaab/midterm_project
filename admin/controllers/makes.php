<?php
require('../../model/database.php');
require('../../model/make_db.php');
require_once('../util/valid_admin.php');



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
} else if ($action == 'delete_make') {
    $makeID = filter_input(INPUT_POST, 'makeID', FILTER_VALIDATE_INT);
    if ($makeID) {
        try {
            delete_make($makeID);
        } catch (PDOException $e) {
            $e = "You cannot delete a make if vehicles are attached to that make.";
            include('../view/error.php');
            exit();
        }
        header("Location: ..");
    }
    $makeID = filter_input(INPUT_POST, 'makeID', FILTER_VALIDATE_INT);
    header("Location: ..");
}