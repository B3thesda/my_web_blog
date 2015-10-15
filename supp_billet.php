<?php
include("connexion_bdd.php");
$sqlsupp = "DELETE FROM billet WHERE id_billet =". $_GET["id_billet"];
$reqsupp = $bdd->prepare($sqlsupp);
$reqsupp->execute();

header("Location:index.php");
?>