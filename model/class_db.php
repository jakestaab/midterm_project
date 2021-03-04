<?php

function get_class_name() {
    global $db;
    $query = 'SELECT * FROM classes
                    ORDER BY ID;';

    $statement = $db->prepare($query);
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes;
}