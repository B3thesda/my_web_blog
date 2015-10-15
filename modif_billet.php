<?php include('connexion_bdd.php') ?>
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
			<form action="index.php" class="nbillet" method="post" enctype ="multipart/form-data">
				<input type="text" name="titremodif" value="<?php echo $billet_modif[0][4]; ?>"class="inpnbillet">Tags associés
				<input type ="text" name="tagsmodif" value ="<?php echo $billet_modif[0][8]; ?>" class="inpnbillet">
				<textarea rows="8" cols="40" name="textemodif" id="3" class="inpnbillet" ><?php echo $billet_modif[0][5]; ?></textarea>
				<input type="file" value="browse" name="img" class="inpnbillet"></input>
				<p>ou</p>
				<input type="url"  name="urlmodif" value = "<?php echo $billet_modif[0][6]; ?>"class="inpnbillet"></input>
				<input type = "hidden" name = "id_billet" value = "<?php echo $_GET["id_billet"]; ?>">
				<input type = "submit" value = "Modifier" class="inpnbillet"></input>
			</form>
		</div>
	</div>
	<footer class="footer">
		<a href="contact.php">Déranger le Léviator</a>
	</footer>	
</body>
</html>
