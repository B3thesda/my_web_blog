<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=magicarpe;unix_socket=/home/thorna_c/.mysql/mysql.sock', 'root', '');
}
catch(Exception $e)
{
   die('Erreur :' . $e->getMessage());  
}

// ON GERE LE FORMULAIRE DE L'INSCRIPTION ----------- OK

if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["login"]) && isset($_POST["mdp"]) && isset($_POST["date"]) && isset($_POST["mail"]))  
{
	$mdpcrypte=md5($_POST["mdp"]);
	$sqlinscription = "INSERT INTO membre (nom, prenom, mail, login, date_de_naissance, pwd, date_inscription, id_droit) VALUES ('" . $_POST["nom"] . "', '" . $_POST["prenom"] . "', '" . $_POST["mail"] . "', '" . $_POST["login"] . "', '" . $_POST["date"] . "', '" . $mdpcrypte ."', CURDATE(), 2)";
	$reqinscription= $bdd->prepare($sqlinscription);
	$reqinscription->execute();
}

// ON GERE LA CONNEXION MEMBRE ------------ OK

if (isset($_POST["loginM"]) && isset($_POST["pwd"]))
{
	$mdpcrypte = md5($_POST["pwd"]);
	$sqlidentification = "SELECT login, pwd, id_droit FROM membre";
	$reqidentification = $bdd->prepare($sqlidentification);
	$reqidentification->execute();
	$identif = $reqidentification->fetchAll();
}



// ON GERE L'ENVOI DE MESSAGES A L'ADMIN ---------- OK

if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["mail"]) && isset($_POST["message"])) 
{
	$nom = $_POST["nom"];
	$prenom = $_POST["prenom"];
	$mail = $_POST["mail"];
	$message = $_POST["message"];

	$sqlmessage = "INSERT INTO message (nom, prenom, mail, message, date_envoi, id_lu) VALUES ('" . $_POST["nom"] . "', '" . $_POST["prenom"] . "', '" . $_POST["mail"] . "', '" . $_POST["message"] . "', NOW(), 0)";
	$reqmessage = $bdd->prepare($sqlmessage);
	$reqmessage->execute();
}

// RECUPERATION DES DONNÉES DE LA PERSONNNE CONNECTÉE
if (!isset($_SESSION["login"])) 
{
		session_start();
}

if (isset($_SESSION["login"])) 
{

	$login = $_SESSION["login"];
	$sqldonnees = "SELECT * FROM membre WHERE login LIKE '" . $login . "'";
	$reqdonnees = $bdd->prepare($sqldonnees);
	$reqdonnees->execute();
	$donnees = $reqdonnees->fetchAll();
 	
 	$id_membre = $donnees[0][0];
 	$id_droit = $donnees[0][1];
	$mail = $donnees[0][2];
	$prenom = $donnees[0][3];
	$nom = $donnees[0][4];
	$naissance = $donnees[0][5];

}

//ENVOI DU BILLET CRÉÉ A LA BDD

if (isset($_POST["titre"]) && isset($_POST["texte"])) 
{
	$sqlcreation = "INSERT INTO billet (title, content, created, id_user, url, tags) VALUES ('" . $_POST["titre"] . "', '". $_POST["texte"] . "', CURDATE(), '". $id_membre ."', '". $_POST["url"] . "', '" . $_POST["tags"] . "')";
	$reqcreation = $bdd->prepare($sqlcreation);
	$reqcreation->execute();
}

// MODIFICATION DES BILLETS

if (isset($_POST["titremodif"]) && isset($_POST["textemodif"])) 
{
	$sqlmodif = "UPDATE billet SET title = '" . $_POST["titremodif"] . "', content = '" . $_POST["textemodif"] . "', updated = CURDATE(), tags = '". $_POST["tagsmodif"] . "', url = '" . $_POST["urlmodif"] . "' WHERE id_billet =" . $_POST["id_billet"];
	$reqmodif = $bdd->prepare($sqlmodif);
	$reqmodif->execute();
}

//RECUPERATION DES BILLETS CRÉÉS
// RECHERCHE PAR TAGS


if (isset($_POST["tags"])) 
{
	$sqlbillet = "SELECT title,content, created, updated, tags, login, url, id_billet FROM billet LEFT JOIN membre ON membre.id_membre = billet.id_user WHERE tags LIKE '". $_POST["tags"] . "'";

}
else
{
	$sqlbillet = "SELECT title, content, created, updated, tags, login, url, id_billet FROM billet LEFT JOIN membre ON membre.id_membre = billet.id_user";

}
$reqbillet = $bdd->prepare($sqlbillet);
$reqbillet->execute();
$billet = $reqbillet->fetchAll();


//ENVOI D'UN COMMENTAIRE A LA BDD

if (isset($_POST["commentaire"])) 
{
$sqlcommentaire = "INSERT INTO commentaire (commentaire, date_com, id_billet) VALUES ('" . $_POST["commentaire"] . "', CURDATE(), '". $_POST["id_billet"] ."')";
$reqcommentaire=$bdd->prepare($sqlcommentaire);
$reqcommentaire->execute();
}

//RECUPERATION DES COMMENTAIRE PAR BILLETS

$sqlcom = "SELECT * FROM commentaire";
$reqcom=$bdd->prepare($sqlcom);
$reqcom->execute();
$com=$reqcom->fetchAll();

// MESSAGE LU

if (isset($_POST["check"])) 
{
	$tablu = $_POST["check"];
	foreach ($tablu as $lu) 
	{
		$sqllu = "UPDATE message SET id_lu = 1 WHERE id_message =" . $lu;
		$reqlu = $bdd->prepare($sqllu);
		$reqlu->execute();
	}
}

// SUPPRESSION MESSAGE

if (isset($_POST['supprimer'])) 
{
	$tabsup = $_POST['supprimer'];
	foreach ($tabsup as $sup) 
	{
	$sqlsup = "DELETE FROM message WHERE id_message = " . $sup;
	$reqsup = $bdd->prepare($sqlsup);
	$reqsup->execute();
	}

}

// MESSAGE IMPORTANT

if (isset($_POST["important"])) 
{
	$tabimp = $_POST["important"];
	foreach ($tabimp as $imp) 
	{
		$sqlimp = "UPDATE message SET id_lu = 2 WHERE id_message =" . $imp;
		$reqimp = $bdd->prepare($sqlimp);
		$reqimp->execute();
	}
}

// RECUPERATION DES MESSAGES

$sqlmsg = "SELECT * FROM message ORDER BY id_lu ASC, date_envoi DESC";
$reqmsg = $bdd->prepare($sqlmsg);
$reqmsg->execute();
$message = $reqmsg->fetchAll();

// MODIFICATION STATUT MEMBRE
if (isset($_POST["membre"])) 
{

	if ($_POST["membre"] == 1) 
	{
		echo "Bien essayé ...";
	}
	else
	{
	if (isset($_POST["statut"])) 
	{
		$sqlmodif=" UPDATE membre SET id_droit =" . $_POST["statut"] . " WHERE id_membre =" . $_POST["membre"];
		$reqmodif = $bdd->prepare($sqlmodif);
		$reqmodif->execute();
	}
	elseif (isset($_POST["suppmembre"])) 
	{
		$sqlsupp="DELETE FROM membre WHERE id_membre =" . $_POST["membre"];
		$reqsupp=$bdd->prepare($sqlsupp);
		$reqsupp->execute;
	}
	}
}
// RECUPERATION DE TOUS LES MEMBRES ET LEURS DROITS

$sqlmembre = "SELECT * FROM membre";
$reqmembre = $bdd->prepare($sqlmembre);
$reqmembre->execute();
$membres = $reqmembre->fetchAll();

//RECUPERATION DES DONNEES DU BILLET CHOISIS

if (isset($_GET["id_billet"])) {

$sql_billet = "SELECT * FROM billet WHERE id_billet = " . $_GET["id_billet"];
$req_billet = $bdd->prepare($sql_billet);
$req_billet->execute();
$billet_modif= $req_billet->fetchAll();

}



?>