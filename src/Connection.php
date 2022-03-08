<?php

namespace App;
use \PDO;

class Connection 

{

function connection() {

try {
    $config = parse_ini_file('config.ini');
    $db = new PDO("mysql:host=".$config['DB_HOST'].";dbname=".$config['DB_NAME'], $config['DB_USERNAME'], $config['DB_PASSWORD']);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

}

}

?>