<?php

class ClassDB {
    public static function get_class_name() {
        $db = Database::getDB();
        $query = 'SELECT * FROM classes
                        ORDER BY ID;';

        $statement = $db->prepare($query);
        $statement->execute();
        $classes = $statement->fetchAll();
        $statement->closeCursor();
        return $classes;
    }

    public static function delete_class($classID) {
        $db = Database::getDB();
        $query = 'DELETE FROM classes
                    WHERE ID = :classID;';
        $statement = $db->prepare($query);
        $statement->bindValue(':classID', $classID);
        $class = $statement->execute();
        $statement->closeCursor();
    }

    public static function add_class($class) {
        $db = Database::getDB();
        $query = 'INSERT INTO classes
                    (class)
                    VALUES
                    (:class);';
        $statement = $db->prepare($query);
        $statement->bindValue(':class', $class);
        $class = $statement->execute();
        $statement->closeCursor();
    }
}