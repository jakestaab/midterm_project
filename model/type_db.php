<?php

class TypeDB {
    public static function get_types() {
        $db = Database::getDB();
        $query = 'SELECT * FROM types
                        ORDER BY ID;';

        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll();
        $statement->closeCursor();
        return $types;
    }

    public static function delete_type($typeID) {
        $db = Database::getDB();
        $query = 'DELETE FROM types
                    WHERE ID = :typeID;';
        $statement = $db->prepare($query);
        $statement->bindValue(':typeID', $typeID);
        $type = $statement->execute();
        $statement->closeCursor();
    }

    public static function add_type($type) {
        $db = Database::getDB();
        $query = 'INSERT INTO types
                    (type)
                    VALUES
                    (:type);';
        $statement = $db->prepare($query);
        $statement->bindValue(':type', $type);
        $type = $statement->execute();
        $statement->closeCursor();
    }
}