<?php

$hostname='localhost';
$dbname='test2';
$username='root';
$password='';

$bdd = new PDO ('mysql:host='.$hostname.';dbname=' . $dbname, $username, $password);

$bddStat = $bdd->prepare('INSERT INTO jeux_video values (NULL, :nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires, NULL)');

$bddStat->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
$bddStat->bindValue(':possesseur', $_POST['possesseur'], PDO::PARAM_STR);
$bddStat->bindValue(':console', $_POST['console'], PDO::PARAM_STR);
$bddStat->bindValue(':prix', $_POST['prix'], PDO::PARAM_STR);
$bddStat->bindValue(':nbre_joueurs_max', $_POST['nbre_joueurs_max'], PDO::PARAM_STR);
$bddStat->bindValue(':commentaires', $_POST['commentaires'], PDO::PARAM_STR);

$insertBdd=$bddStat->execute();

if ($insertBdd) {
    echo "Envoyé dans la base de données";
} else {
    echo "Erreur";
    echo print_r($_POST);
}
