<?php
header('Content-Type: application/json');
include("bdd.php");

$req = "SELECT * FROM rapport ORDER BY date ASC LIMIT 100";
$ex = $link->prepare($req);
$ex->execute();

while($row = $ex->fetch(PDO::FETCH_ASSOC))
{
    $bras = $row['tBras'];
    $jambe = $row['tJambe'];
    $fesse = $row['tFesse'];
    $ventre = $row['tVentre'];
    $date = $row['date'];

    $data[] = [
        'date' => $date, 'bras' => $bras, 'jambes' => $jambe, 'fesses' => $fesse, 'ventre' => $ventre
    ];


}

echo json_encode($data, JSON_PRETTY_PRINT);