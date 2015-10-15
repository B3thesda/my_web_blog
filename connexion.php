<?php include("connexion_bdd.php"); ?>
<!-- goo.gl/ncALNC -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Magicarpe's Blog</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" type="image/jpg" href="misc/magicarpe.jpg"/>
	<script type = "text/javascript" src = "connexion.js"></script>
	<meta name="description" content="Blog de Magicarpe, fameux pour ses puissantes attaques trempetes. Pokémon n°129">
</head>

<body onLoad = "recuperation()">

	<div class="head">
		<header>
			<h1><a href="index.php" title="accueil du site">Bienvenue sur le blog de Magicarpe !</a></h1>
		</header>
	</div>

	<div class="corpse">

		<section id="inscrit">
			<h2>Déjà inscrit:</h2>

			<form action="connexion.php" method="post" onSubmit = "return verificationConnexion()">
				<input type="text" placeholder="Votre login" name="loginM" id="loginConnexion">
				<input type="password" placeholder="Entrez votre mot-de-passe" name="pwd" id="mdpConnexion">
				<input type ="submit" value="Se Connecter">
			</form>

			<?php 

			if (isset($_POST["loginM"]) && isset($_POST["pwd"])) 
			{
				foreach ($identif as $verif) 
				{
					if ($verif['login'] === $_POST["loginM"] && $verif['pwd'] === md5($_POST["pwd"])) 
					{
						session_start();
						$_SESSION["login"] = $_POST["loginM"];
						header("Location:index.php");
					}
					else
					{
						echo "<script>alert(\"Mauvais login ou mot-de-passe\")</script>";
					}
				}
			} ?>

		</section>

		<section id="newmembre">
			<h2>Inscription :</h2>

			<form action="connexion.php" method="post" onSubmit = "return verificationInscription()">

				<div>
					<input type="text" placeholder="Nom" name="nom" id="nomInscription"/>
					<span class="jsSpan">Mauvais champs</span>
				</div>
				<div>
					<input type="text" placeholder="Prénom" name="prenom" id="prenomInscription">
					<span class="jsSpan">Mauvais champs</span>
				</div>
				<div>
					<input type="text" placeholder="Login" name="login" id="loginInscription">
					<span class="jsSpan">Mauvais champs</span>
				</div>
				<div>
					<input type="password" placeholder="Entrez un mdp" name="mdp" id="mdpInscription">
					<span class="jsSpan">Mauvais champs</span>
				</div>
				<div>
					<input type="password" placeholder="Confirmez votre mdp" name="confirmation" id="mdpConfirmationInscription">
					<span class="jsSpan">Doit être identique au mdp</span>
				</div>
				<div>
					<input type="date" name="date" placeholder="aaaa-mm-jj" id="dateInscription">
					<span  class="jsSpan">Mauvais champs</span>
				</div>
				<div>
					<input type="email" name="mail" placeholder="pikachu@pokemon.com" id="emailInscription">
					<span  class="jsSpan">Mauvais champs</span>
					<input type="submit" value="S'inscrire">
				</div>
			</form>

			<?php if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["login"]) && isset($_POST["mdp"]) && isset($_POST["date"]) && isset($_POST["mail"]))
			{ } ?>
		</section>
	</div>

	<footer class="footer">
		<a href="contact.php">Déranger le Léviator</a>
	</footer>

</body>
</html>