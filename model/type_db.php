<?php

function get_types() {
    global $db;
    $query = 'SELECT * FROM types
                    ORDER BY ID;';

    $statement = $db->prepare($query);
    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();
    return $types;
}

function delete_type($typeID) {
    global $db;
    $query = 'DELETE FROM types
                WHERE ID = :typeID;';
    $statement = $db->prepare($query);
    $statement->bindValue(':typeID', $typeID);
    $type = $statement->execute();
    $statement->closeCursor();
}

function add_type($type) {
    global $db;
    $query = 'INSERT INTO types
                (type)
                VALUES
                (:type);';
    $statement = $db->prepare($query);
    $statement->bindValue(':type', $type);
    $type = $statement->execute();
    $statement->closeCursor();
}