<?php

include 'connect.php';

$bddStat = $bdd->prepare('INSERT INTO client values (NULL, :nom_cli, :pre_cli, :adr_cli, :tel_cli)');

$bddStat->bindValue(':nom_cli', $_POST['nom_cli'], PDO::PARAM_STR);
$bddStat->bindValue(':pre_cli', $_POST['pre_cli'], PDO::PARAM_STR);
$bddStat->bindValue(':adr_cli', $_POST['adr_cli'], PDO::PARAM_STR);
$bddStat->bindValue(':tel_cli', $_POST['tel_cli'], PDO::PARAM_STR);

$insertBdd=$bddStat->execute();

if ($insertBdd) {
    echo "Envoyé dans la base de données";
} else {
    echo "Erreur";
}
