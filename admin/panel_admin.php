<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8"/>
	<title>Tableau de bord</title>
	<link  rel = "stylesheet" href = "style.css" type = "text/css" />
	<script type = "text/javascript" src = "formulaire.js"></script>
</head>
<body>
	<div class="head">
		<header>
			<h1><a href="index.php" title="accueil du site">Blog de magicapre !</a></h1>
		</header>
		<nav>
			<a href="index.php">retour</a>
		</nav>
	</div>
	<form class="nbillet">
		<!-- afficher le nom et le prenom utilisateur -->
		<input type="password" placeholder="Entrez votre ancien mdp" name="lastMdp" class="inpnbillet">
		<input type="password" placeholder="Entrez un nouveau mdp" name="mdp class="inpnbillet"">
		<input type="password" placeholder="Confirmez nouveau mdp" name="confirmation" class="inpnbillet">
		<input type="email" name="mail" placeholder="mettre a jour vos information ?" class="inpnbillet">
		<!-- select avec tout les membre ==> pour banir (admin)-->
		<input type="submit" value="Sauvegarder">
	</form>
	<div class="corpse">
		<footer class="footer">
			<a href="contact.php">Déranger le Léviator</a>
		</footer>	
	</div>
</body>
</html>