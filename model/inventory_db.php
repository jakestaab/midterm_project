<?php

function get_vehicles($price_or_year) {
    global $db;
    if ($price_or_year == NULL || $price_or_year == FALSE || $price_or_year == 1) {
        $query = 'SELECT
                vehicles.year, vehicles.model, vehicles.price,
                types.Type, classes.Class, makes.Make
                FROM vehicles, types, classes, makes
                WHERE vehicles.type_id = types.ID
                AND vehicles.class_id = classes.ID
                AND vehicles.make_id = makes.ID
                ORDER BY price DESC;';
    } else if ($price_or_year == 2) {
        $query = 'SELECT
                vehicles.year, vehicles.model, vehicles.price,
                types.Type, classes.Class, makes.Make
                FROM vehicles, types, classes, makes
                WHERE vehicles.type_id = types.ID
                AND vehicles.class_id = classes.ID
                AND vehicles.make_id = makes.ID
                ORDER BY year DESC;';
    }
    

    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}