<?php
include("bdd.php");


$date = $_POST["date"];
$poids = $_POST["poids"];
$jambe = $_POST["tJambes"];
$bras = $_POST["tBras"];
$fesse = $_POST["tFesses"];
$ventre = $_POST["tVentre"];
$graisse = $_POST["pGraisse"];
$muscle = $_POST["pMuscle"];

$req = "INSERT INTO rapport (poids, tJambe, tBras, tFesse, tVentre, pGras, pMuscle, date) VALUES 
($poids, $jambe, $bras, $fesse, $ventre, $graisse, $muscle, '$date')";
$ex = $link->prepare($req);
$ex->execute();


header('Location: ../rapport.php');