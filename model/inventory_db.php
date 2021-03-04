<?php

function get_vehicles($price_or_year, $make_id, $type_id, $class_id) {
    global $db;
    if ($price_or_year == NULL || $price_or_year == FALSE || $price_or_year == 1) {
        $order = ' ORDER BY price DESC;';
    } else {
        $order = ' ORDER BY year DESC;';
    }

    if($make_id != NULL || $make_id != FALSE) {
        $m = ' AND vehicles.make_id = :make_id';
    } else {
        $m = '';
    }

    if($type_id != NULL || $type_id != FALSE) {
        $t = ' AND vehicles.type_id = :type_id';
    } else {
        $t = '';
    }

    if($class_id != NULL || $class_id != FALSE) {
        $c = ' AND vehicles.class_id = :class_id';
    } else {
        $c = '';
    }

    $query = 'SELECT
            vehicles.year, vehicles.model, vehicles.price,
            types.Type, classes.Class, makes.Make
            FROM vehicles, types, classes, makes
            WHERE vehicles.type_id = types.ID
            AND vehicles.class_id = classes.ID
            AND vehicles.make_id = makes.ID
            ';

    $statement = $db->prepare($query . $m . $t . $c . $order);
    if($make_id != NULL || $make_id != FALSE) {
        $statement->bindValue(':make_id', $make_id);
    }
    if($type_id != NULL || $type_id != FALSE) {
        $statement->bindValue(':type_id', $type_id);
    }
    if($class_id != NULL || $class_id != FALSE) {
        $statement->bindValue(':class_id', $class_id);
    }
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

/*
else if ($type_id != NULL || $type_id != FALSE) {
    $query = 'SELECT
            vehicles.year, vehicles.model, vehicles.price,
            types.Type, classes.Class, makes.Make
            FROM vehicles, types, classes, makes
            WHERE vehicles.type_id = types.ID
            AND vehicles.class_id = classes.ID
            AND vehicles.make_id = makes.ID
            AND vehicles.type_id = :type_id
            ORDER BY price DESC;';
}
} else {
$query = 'SELECT
        vehicles.year, vehicles.model, vehicles.price,
        types.Type, classes.Class, makes.Make
        FROM vehicles, types, classes, makes
        WHERE vehicles.type_id = types.ID
        AND vehicles.class_id = classes.ID
        AND vehicles.make_id = makes.ID
        ORDER BY price DESC;';
}
*/