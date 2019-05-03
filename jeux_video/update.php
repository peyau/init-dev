<?php

$req = $bdd->prepare('UPDATE jeux_video SET nom = :nom, possesseur = :possesseur, console = :console, prix = :prix, nbre_joueurs_max = :nbre_joueurs_max, commentaires = :commentaires WHERE ID = '.$encours); 

$req->execute(array(
	'nom' => $nom,
	'possesseur' => $possesseur,
	'console' => $console,
	'prix' => $prix,
	'nbre_joueurs_max' => $nbre_joueurs_max,
	'commentaires' => $commentaires
	));

?>