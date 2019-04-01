<?php

if ($encours == -1)
{
	$nom = '';
	$possesseur = '';
	$console = '';
	$prix = '';
	$nbre_joueurs_max = '';
	$commentaires = '';
}
else
{
	include('connect.php');
	$req = $bdd->prepare('SELECT * FROM jeux_video WHERE ID = :id');
	$req->bindParam(':id', $encours, PDO::PARAM_INT);
	$req->execute();
	while ($donnees = $req->fetch())
	{
		$nom = $donnees['nom'];
		$possesseur = $donnees['possesseur'];
		$console = $donnees['console'];
		$prix = $donnees['prix'];
		$nbre_joueurs_max = $donnees['nbre_joueurs_max'];
		$commentaires = $donnees['commentaires'];		
	}
	$req->closeCursor();
}

?>