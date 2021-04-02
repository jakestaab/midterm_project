<?php
require_once('../../model/database.php');
require_once('../../model/admin_db.php');

if(!isset($is_valid_admin)) {
    header("Location: ?action=login");
}