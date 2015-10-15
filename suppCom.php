<?php
include('connexion_bdd.php');

$sqlsupp = "DELETE FROM commentaire WHERE id_commentaire = ". $_GET["id_commentaire"];
$reqsupp=$bdd->prepare($sqlsupp);
$reqsupp->execute();
echo $sqlsupp;
header("Location:index.php");
?>