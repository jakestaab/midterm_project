<?php 
    /*
    $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    $username = 'root';
    $password = 'sesame';
    */

    class Database {
        private static $dsn = 'mysql:host=eyw6324oty5fsovx.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=g8wbc0twqar62fu9';
        private static $username = 'nmcaz1rxzlfmyxno';
        private static $password = 'ty2yef9ewuzv8gxs';
        private static $db;

        private function __construct() {}

        public static function getDB() {
            if (!isset(self::$db)) {
                try {
                    self::$db = new PDO(self::$dsn,
                                        self::$username,
                                        self::$password);
                } catch (PDOException $e) {
                    $error_message .= $e->getMessage();
                    exit();
                }
            }
            return self::$db;
        }
    }