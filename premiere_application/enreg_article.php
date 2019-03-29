<?php

include 'connect.php';

$bddStat = $bdd->prepare('INSERT INTO article values (NULL, :design_art, :prix_art)');

$bddStat->bindValue(':design_art', $_POST['design_art'], PDO::PARAM_STR);
$bddStat->bindValue(':prix_art', $_POST['prix_art'], PDO::PARAM_STR);

$insertBdd=$bddStat->execute();

if ($insertBdd) {
    echo "Envoyé dans la base de données";
} else {
    echo "Erreur";
}
