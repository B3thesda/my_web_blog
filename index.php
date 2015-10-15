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
			<h1><a href="index.php" title="accueil du site">Bienvenue sur le blog de Magicarpe !</a></h1>
		</header>

		<nav>
			<?php
			include('connexion_bdd.php'); 
			if (isset($_SESSION["login"]))
			{?>
				<a href="deconnexion.php">Se déconnecter</a>
				<a href="admin">Espace de gestion</a>
				<a href="edit_billet.php">Créer un article</a>
			<?php } 
			else{
			?>
			<a href="connexion.php">Se connecter</a>
			<?php } ?>
		</nav>
	</div>

	<div id="blocpage">
		<div class="corpse">
			<section id="recherche">
				<form method = "post" action = "index.php">
				<input type = "text" name = "tags" placeholder = "Recherche par tags">
				<input type = "submit" value = "Rechercher">
				</form>
				</section>

			<section class="articles">
				<!-- Doit etre dans boucle PHP pour chaque billet existant-->
					<?php foreach ($billet as $value) 
					{ 
						$titre = $value[0];
						$article = $value[1];
						$creation = $value[2];
						$lastmodif = $value[3];
						$tag = $value[4];
						$loginB = $value[5];
						$lien = $value[6];
						$id_billet = $value[7];

						$article= preg_replace( "#\[b\](.*)\[/b\]#si", "<span class = \"gras\" >$1</span>",$article);
  						$article = preg_replace( "#\[i\](.*)\[/i\]#si", "<span class = \"italique\" >$1</span>",$article); 
    					$article= preg_replace( "#\[s\](.*)\[/s\]#si", "<span class = \"souligne\" >$1</span>",$article); 
  
						?>
					<section>
					<header>
						<a href="#" title="$titre"><?php echo $titre; ?></a>
					</header>
					
					<p>le <?php echo $creation; ?></p>
					
					<?php if (!empty($lastmodif))
					{ ?>
					<!-- condition si date de derniere modif existante -->
					<p>Modifié le <?php echo $lastmodif; ?></p>
					<?php } ?>
					
					<article><?php echo nl2br($article); ?></article>
					<p><?php echo $tag; ?></p>
					<?php if (isset($lien)) 
					{ 
						if (strpos($lien, "youtube") !== false) 
						{
							$newlien = str_replace("watch?v=", "embed/", $lien);
						
						?>
						<object type="text/html" data="<?php echo $newlien; ?>" style="width:640px;height:385px;"></object>
					<?php }

						elseif (strpos($lien, "dailymotion") !== false) 
						{ 
							$newlien = str_replace("/video/", "/embed/video/", $lien);
							?>

					<iframe frameborder="2" width="480" height="270" src="<?php echo $newlien; ?>" allowfullscreen></iframe>
					<?php	} }?>

					<footer>Par :
					<a href="#" title="$login"><?php echo $loginB; ?></a>
					</footer>
					<?php 
					if (isset($_SESSION["login"])) 
					{ 
						if ($id_droit < 2 || $loginB == $_SESSION["login"]) { ?>
						<a href="modif_billet.php?id_billet=<?php echo $id_billet; ?>">Modifier l'article</a>
						<a href="supp_billet.php?id_billet=<?php echo $id_billet; ?>">Supprimer l'article</a>
					<?php } } ?>
					<?php
					foreach ($com as $commentaire) 
					{
						$id_com = $commentaire[0];
					 	$idBcom = $commentaire[1];
					 	$date_com = $commentaire[2];
					 	$texte = $commentaire[3];
						
						if ($idBcom === $id_billet) 
						{ ?>
							<p><?php echo nl2br($texte); ?></p>
							<span>Le: <?php echo $date_com; ?></span>
						<?php
							if (isset($_SESSION["login"])) 
						{?>
							<a href="suppCom.php?id_commentaire=<?php echo $id_com?>">Supprimer</a>
						<?php } } } ?> 
					<form action="index.php" method="post" class="commentaire">
						<input type="hidden" name="id_billet" value="<?php echo $id_billet; ?>">
						<input rows="8" cols="40" name="commentaire" placeholder="Ecrire un commentaire..."></textarea>
						<input type="submit" value="Commenter">
					</form>
					<?php ?>
				</section>
					<?php }?>
			</section>
		</div>
	</div>

	<footer class="footer">
		<a href="contact.php">Déranger le Léviator</a>
	</footer>

</body>
</html>