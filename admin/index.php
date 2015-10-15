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
			<input type="email" name="mail" placeholder="Changer mail" class="inpnbillet">		<!-- select avec tout les membre ==> pour banir (admin)-->
			<!-- select avec le nom et la date de chaque article ==> pour suprimmer (admin ou createur) -->
			<input type="submit" value="Valider mes modifications">
		</form>

		<?php if ($id_droit < 2) {?>
		<div id="messages">
			<h2>Messages</h2>
			<form method="post" action="index.php">
			<?php foreach ($message as $msg) 
			{
				$id_message = $msg[0];
				$nom = $msg[1];
				$prenom = $msg[2];
				$date_envoi = $msg[3];
				$mail =$msg[4];
				$message = $msg[5];
				$lu =$msg[7]; ?>
				<section class = "<?php if ($lu == 0) 
				{
					echo "nonlu";}
					elseif ($lu == 1) 
					{
						echo "lu";
					}
					elseif ($lu == 2) {
						echo "important";
					}?>">
				<h3>
					Expéditeur : <span class="exp"><?php echo "$prenom $nom : $mail"; ?></span></h3>
				<h4>Le <?php echo $date_envoi; ?></h4>
				<article>
					<?php echo $message; ?>
				</article>
				<input type="radio" name ="check[]"value='
				<?php
				echo $id_message;
				?>'/>Lu
				<input type="radio" name ="important[]"value='
				<?php
				echo $id_message;
				?>'/>Important
				<input type="radio" name ="supprimer[]"value='
				<?php
				echo $id_message;
				?>'/>Supprimer
				<P><?php
				if ($lu == 0) 
				{
					echo "NON LU"; 	
				} 
				elseif ($lu == 1) 
				{
					echo "LU";
				}
				elseif ($lu == 2) {
					echo "IMPORTANT";
				}?></P>
			</section>
			<?php }?>
			
			<input type = "submit" value="Envoyer">
			
			</form>
			</div>

			<div id = "statuts">
			<form method="post" action="index.php">

				<select name="membre">
					<?php foreach ($membres as $member)
					{ 
						$droitMembre=$member[1];
						if ($droitMembre == 1) {
							$statutMembre = "Admin";
						}
						elseif ($droitMembre == 2) 
						{
							$statutMembre = "Blogger";
						}
						elseif ($droitMembre == 0) 
						{
							$statutMembre = "Root";
						}
						$loginMembre=$member[8];
						$id_membre = $member[0];
					?>
					<option value = "<?php echo $id_membre ?>"> <?php echo "$loginMembre $statutMembre"?></option>
					<?php } ?>
				</select>
				<select name = "statut">
					<option value = "0">Modifier le statut</option>
					<option value = "1">Administrateur</option>
					<option value = "2">Blogger</option>
				</select>
				<input type="checkbox" value="suppmembre"> Supprimer le membre
			<input type="submit" value ="Modifier">	
			</form>
			</div>
		<?php } ?>
	</div>
	<footer class="footer">
		<a href="../contact.php">Déranger le Léviator</a>
	</footer>	
</body>
</html>