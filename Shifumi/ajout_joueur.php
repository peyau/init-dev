<?php
include 'connect.php';

echo '<form action="" method="post">
<table>
    <tr>
        <td>Nom</td>
        <td><input type="text" name="nom"></td>
    </tr>

    <tr>
        <td>Mot de passe</td>
        <td><input type="password" name="password"></td>
    </tr>

    <tr>
        <td><input type="submit" value="S\'inscrire"></td>
        <td><input type="reset" value="Réinitialiser"></td>
    </tr>
';

if(isset($_POST['nom']) && isset($_POST['password'])){
    $reqAddPlayer=$bdd->prepare('INSERT INTO `joueur` (`id`, `nom`, `vic`, `victot`, `vicordi`, `niveau`, `pwd`) VALUES (NULL, :nom, 0, 0, 0, 1, :pwd)');

    $reqAddPlayer->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
    $reqAddPlayer->bindValue(':pwd', $_POST['password'], PDO::PARAM_STR);

    $reqAddPlayer->execute();

    echo '<p>Utilisateur enregistré, vous pouvez retourner <a href="index.php">ici pour vous connecter</a></p>';
}
