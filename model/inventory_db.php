<?php

function get_vehicles_by_price() {
    global $db;
    $query = 'SELECT
                vehicles.year, vehicles.model, vehicles.price,
                types.Type, classes.Class, makes.Make
                FROM vehicles, types, classes, makes
                WHERE vehicles.type_id = types.ID
                AND vehicles.class_id = classes.ID
                AND vehicles.make_id = makes.ID
                ORDER BY price DESC;';

    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}