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

function delete_class($classID) {
    global $db;
    $query = 'DELETE FROM classes
                WHERE ID = :classID;';
    $statement = $db->prepare($query);
    $statement->bindValue(':classID', $classID);
    $class = $statement->execute();
    $statement->closeCursor();
}

function add_class($class) {
    global $db;
    $query = 'INSERT INTO classes
                (class)
                VALUES
                (:class);';
    $statement = $db->prepare($query);
    $statement->bindValue(':class', $class);
    $class = $statement->execute();
    $statement->closeCursor();
}