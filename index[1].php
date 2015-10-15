<?php 
set_include_path("../");
include("connexion_bdd.php");
if (!isset($_SESSION["login"])) 
{
	header("Location:../connexion.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8"/>
	<title>Magicarpe's Blog</title>
	<link  rel = "stylesheet" href = "../style.css" type = "text/css" />
	<script type = "text/javascript" src = "formulaire.js"></script>
</head>
<body>
	<div class="head">
		<header>
			<h1><a href="../index.php" title="accueil du site">Bienvenue</a></h1>
		</header>
		<nav>
			<a href="index.php">retour</a>
		</nav>
	</div>
	<div class="corpse">
		<form class="nbillet">
			<!-- afficher le nom et le prenom utilisateur -->
			<input type="password" placeholder="Entrez votre ancien mdp" name="lastMdp" class="inpnbillet">
			<input type="password" placeholder="Entrez un nouveau mdp" name="mdp class="inpnbillet"">
			<input type="password" placeholder="Confirmez nouveau mdp" name="confirmation" class="inpnbillet">
			<input type="date" name="date" placeholder="aaaa-mm-jj" class="inpnbillet">		<!-- select avec tout les membre ==> pour banir (admin)-->
			<!-- select avec le nom et la date de chaque article ==> pour suprimer (admin ou createur) -->
			<input type="submit" value="Sauvegarder">
		</form>
	</div>
	<footer class="footer">
		<a href="contact.php">Déranger le Léviator</a>
	</footer>	
</body>
</html>