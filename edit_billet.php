<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Magicarpe's Blog</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="icon" type="image/jpg" href="misc/magicarpe.jpg"/>
	<meta name="description" content="Blog de Magicarpe, fameux pour ses puissantes attaques trempetes. Pokémon n°129">
</head>
<body>
	<div class="head">
		<header>
			<h1><a href="index.php" title="accueil du site">Editeur de Billets</a></h1>
		</header>
		<nav>
			<a href="index.php">retour</a>
		</nav>
	</div>
	<div id="blocpage">
		<div class="corpse">
			<div><!-- element rajoutable --></div>
			<form action="index.php" class="nbillet" method="post" enctype ="multipart/form-data">
				<input type="text" placeholder="Titre" name="titre" class="inpnbillet"></input>Tags associés
				<input type ="text" placeholder="(Séparés par des virgules)" name="tags" class="inpnbillet">
				<textarea rows="8" cols="40" placeholder="Entrer votre texte ici..." name="texte" id="3" class="inpnbillet"></textarea>
				<input type="file" value="browse" name="img" class="inpnbillet"></input>
				<p>ou</p>
				<input type="url" placeholder="url :" name="url" class="inpnbillet"></input>
				<input type = "submit" value = "Envoyer" class="inpnbillet"></input>
			</form>
			<?php 
			// if (isset($_POST["titre"]) && isset($_POST["texte"])) 
			// {
			// 	if (isset($_FILE["img"])) 
			// 	{
			// 		$upload = "images/";
			// 		$image = $_FILES['photo']['tmp_name'];
			// 		$picture = $_FILES['photo']['name'];

			// 		if(!empty($_FILES['photo']['tmp_name']))
			// 		{
			// 		if(!move_uploaded_file($image,$upload . $picture))
			// 		{
			// 		exit("Votre image n'a pas été téléchargé correctement");
			// 		}
			// 		else {

			// 		$bdd->query("UPDATE billet SET img = '".$_FILES['photo']['name']. "' WHERE id=".$_POST['id']);
			// 		}

			// 		}
			// 		$destination = "images/";
			// 		$recup = move_uploaded_file($_FILE["img"]["tmp_name"] , $destination);
			// 	}
			// } ?>
		</div>
	</div>
	<footer class="footer">
		<a href="contact.php">Déranger le Léviator</a>
	</footer>	
</body>
</html>