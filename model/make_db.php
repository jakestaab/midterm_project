<?php

class MakeDB {
    public static function get_makes() {
        $db = Database::getDB();
        $query = 'SELECT * FROM makes
                        ORDER BY Make;';

        $statement = $db->prepare($query);
        $statement->execute();
        $makes = $statement->fetchAll();
        $statement->closeCursor();
        return $makes;
    }

    public static function delete_make($makeID) {
        $db = Database::getDB();
        $query = 'DELETE FROM makes
                    WHERE ID = :makeID;';
        $statement = $db->prepare($query);
        $statement->bindValue(':makeID', $makeID);
        $make = $statement->execute();
        $statement->closeCursor();
    }

    public static function add_make($make) {
        $db = Database::getDB();
        $query = 'INSERT INTO makes
                    (make)
                    VALUES
                    (:make);';
        $statement = $db->prepare($query);
        $statement->bindValue(':make', $make);
        $make = $statement->execute();
        $statement->closeCursor();
    }
}