<?php include("connexion_bdd.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8"/>
	<title>Magicarpe's Blog</title>
	<link  rel = "stylesheet" href = "style.css" type = "text/css" />
	<script type = "text/javascript" src = "formulaire.js"></script>
</head>
<body>
	<div class="head">
		<header>
			<h1><a href="index.php" title="accueil du site"><img src="misc/logo.png" alt="Bienvenue sur le blog de Magicarpe !">Bienvenue <?php echo $login; ?></a></h1>
		</header>
		<nav>
			<a href="index.php">retour</a>
		</nav>
	</div>
	<div class="corpse">
		<form class="nbillet">
			<!-- afficher le nom et le prenom utilisateur -->
			<input type="password" placeholder="Entrez votre ancien mdp" name="lastMdp" class="inpnbillet">
			<input type="password" placeholder="Entrez un nouveau mdp" name="mdp" class="inpnbillet">
			<input type="password" placeholder="Confirmez nouveau mdp" name="confirmation" class="inpnbillet">
			<input type="date" name="date" class="inpnbillet">		
			<input type="submit" value="Sauvegarder">
		</form>
		
		<footer class="footer">
			<a href="contact.php">Déranger le Léviator</a>
		</footer>	
	</div>
</body>
</html>