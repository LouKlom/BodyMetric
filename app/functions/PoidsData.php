<?php
header('Content-Type: application/json');
include("bdd.php");

$req = "SELECT * FROM rapport ORDER BY date ASC LIMIT 100";
$ex = $link->prepare($req);
$ex->execute();

while($row = $ex->fetch(PDO::FETCH_ASSOC))
{
    $poids = $row['poids'];
    $date = $row['date'];

    $data[] = [
        'date' => $date, 'poids' => $poids
    ];
}

echo json_encode($data, JSON_PRETTY_PRINT);