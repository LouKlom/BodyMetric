<?php
header('Content-Type: application/json');
include("bdd.php");

$req = "SELECT * FROM rapport GROUP BY id_rapport DESC LIMIT 100";
$ex = $link->prepare($req);
$ex->execute();

while($row = $ex->fetch(PDO::FETCH_ASSOC))
{
    $gras = $row['pGras'];
    $date = $row['date'];

    $data[] = [
        'date' => $date, 'indice' => $gras
    ];


}

echo json_encode($data, JSON_PRETTY_PRINT);