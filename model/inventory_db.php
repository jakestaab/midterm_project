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
            vehicles.year, vehicles.model, vehicles.price, vehicles.v_num,
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

function delete_vehicle($v_num) {
    global $db;
    $query = 'DELETE FROM vehicles
                WHERE v_num = :v_num;';
    $statement = $db->prepare($query);
    $statement->bindValue(':v_num', $v_num);
    $vehicle = $statement->execute();
    $statement->closeCursor();
}

function add_vehicle($year, $model, $price, $type_id, $class_id, $make_id) {
    global $db;
    $query = 'INSERT INTO vehicles
                (year, model, price, type_id, class_id, make_id)
                VALUES
                (:year, :model, :price, :type_id, :class_id, :make_id);';
    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':class_id', $class_id);
    $statement->bindValue(':make_id', $make_id);
    $vehicle = $statement->execute();
    $statement->closeCursor();
}