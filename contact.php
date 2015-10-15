<!DOCTYPE HTML>

<HTML>

<HEAD>
<meta charset = "utf-8"/>
<title>Margicarpe's Blog - Contact</title>
<link  rel = "stylesheet" href = "style.css" type = "text/css" />
<script type = "text/javascript" src = "formulaire.js"></script>
</HEAD>

<BODY onLoad = "start()">

	<div>
	<header>
		<h1><a href="index.php" title="accueil du site">Bienvenue sur le blog de Magicarpe !</a></h1>
	</header>

	<nav>
		<?php
			if (!isset($_SESSION["login"])) 
			{	
				session_start();
			 	session_destroy();
			 } 
			if (isset($_SESSION["login"])) 
			{?>	
				<a href="deconnexion.php">Se déconnecter</a>
			<?php } 
			else{
			?>
			<a href="connexion.php">Se connecter</a>
			<?php } ?>
	</div>

	<div id = "formulaire">

<FORM method = "post" onSubmit = "return verification()">

<div id = "droit">

<div>
<input type = "text" placeholder = "Nom" name = "nom" id = "0"></input>
<span>Champs incorrect.</span>
</div>

<div>
<input type = "text" placeholder = "Prénom" name = "prenom" id = "1"></input>
<span>Champs incorrect.</span>
</div>

<div>
<input type = "text" placeholder = "Email" name = "mail" id = "2"></input>
<span>Champs incorrect.</span>
</div>

</div>

<div id = "gauche">

<textarea rows = "8" cols = "40" name = "message" id = "3" placeholder="Entrer votre texte ici..."></textarea>
</div>

<input type = "submit" value = "Envoyer"></input>

<?php 
	include("connexion_bdd.php");
?>

</FORM>

</div>

<footer>
	<a href="contact.php">Déranger le Léviator</a>
</footer>

</BODY>

</HTML>