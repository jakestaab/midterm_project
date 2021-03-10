<?php 
    $dsn = 'mysql:host=eyw6324oty5fsovx.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=g8wbc0twqar62fu9';
    $username = 'nmcaz1rxzlfmyxno';
    $password = 'ty2yef9ewuzv8gxs';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = "Database Error: ";
        $error_message .= $e->getMessage();
        echo $error_message;
        exit();
    }