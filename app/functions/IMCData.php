<?php
header('Content-Type: application/json');
include("bdd.php");

$reqTaille = "Select taille from taille LIMIT 1";
$exTaille = $link->prepare($reqTaille);
$exTaille->execute();
$taille = $exTaille->fetchColumn(); 


$data = [];

$reqRapport = "Select poids, date from rapport ORDER BY date ASC LIMIT 100";
$exRapport = $link->prepare($reqRapport);
$exRapport->execute();

while($rowRapport = $exRapport->fetch(PDO::FETCH_ASSOC))
{
    $poids = $rowRapport['poids'];
    $date = $rowRapport['date'];

    $tailleConv = $taille / 100;
    $valeurIMC = $poids / ($tailleConv * $tailleConv);


    $data[] = [
        'date' => $date,
        'valeurIMC' => $valeurIMC
    ];
}





echo json_encode($data, JSON_PRETTY_PRINT);
