<?php

function get_makes() {
    global $db;
    $query = 'SELECT * FROM makes
                    ORDER BY ID;';

    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

function delete_make($makeID) {
    global $db;
    $query = 'DELETE FROM makes
                WHERE ID = :makeID;';
    $statement = $db->prepare($query);
    $statement->bindValue(':makeID', $makeID);
    $make = $statement->execute();
    $statement->closeCursor();
}

function add_make($make) {
    global $db;
    $query = 'INSERT INTO makes
                (make)
                VALUES
                (:make);';
    $statement = $db->prepare($query);
    $statement->bindValue(':make', $make);
    $make = $statement->execute();
    $statement->closeCursor();
}