<?php
session_start();

include 'connect.php';

if(!isset($_SESSION['nomJoueur'])):
    echo '<form method="post" action="index.php">
    <table>
        <tr>
            <td>Qui va jouer?</td>
            <td><input type="text" name="nom" maxlength="15"></td>
        </tr>
        <tr>
            <td>Mot de passe</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
        <td><input type="submit" value="Commencer"></td>';

?>

<html>

<head><title>Connexion</title></head>

<body>
<h1>Jeu du Shi-Fu-Mi</h1>

<h3>Faites votre choix, et lancez la partie</h3>
<h4>Les ciseaux battent le papier, le papier bat la pierre et la pierre bat les ciseaux</h4>

<?php

if(isset($_POST['nom']) && isset($_POST['password'])){
    // Préparation de la requête
    $reqConnect = $bdd->prepare("SELECT * FROM joueur WHERE nom=:nom AND pwd=:pwd");
    // Association des valeurs
    $reqConnect->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
    $reqConnect->bindValue(':pwd', $_POST['password'], PDO::PARAM_STR);
    // Exécution
    $reqConnect->execute();
    // Mettre le nombre de résultats retournés dans une variable
    $nbLigne=$reqConnect->rowCount();
    // Vérifier le contenu de cette variable
    if($nbLigne==1){ // Si la requête renvoie quelque chose, on effectue la connexion
        echo '<td>Redirection en cours...</td>';
        
        $donnees = $reqConnect->fetch();
        $_SESSION['nomJoueur']=$donnees['nom'];
        $_SESSION['pwdJoueur']=$donnees['pwd'];

        header('Refresh:1.5;jeu.php');
    } else {
        //print_r($reqConnect->errorInfo());
        echo '<td>Identifiants incorrects</td>';
    }
}

echo '</tr></table>';
echo '<a href="ajout_joueur.php">Créer un utilisateur';
else:
    echo 'Vous êtes déjà connecté<br>Redirection vers la page de jeu';
    header('Refresh:3;jeu.php');
endif;
