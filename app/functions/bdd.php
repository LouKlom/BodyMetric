<?php

$dsn = 'mysql:host=localhost:3306;dbname=sport';
$username = '########';     // BDD username
$password = '########';     // Bdd password

try {
    $link = new PDO($dsn, $username, $password);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();  

}



?>