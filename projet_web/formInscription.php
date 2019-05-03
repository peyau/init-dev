<?PHP
if(!isset($_SESSION['prenomUtilisateur'])){
    echo '<span class="title">Inscription</span>
    <form method="post" action="">
        <span class="forme">Identifiant :</span><br>
        <input type="text" name="identifiant" class="champ" required><br>
        <span class="forme">Mot de passe :</span><br>
        <input type="password" name="mdp" class="champ" required><br>
        <span class="forme">Prenom :</span><br>
        <input type="text" name="prenom" class="champ">
        <input type="button" value="S\'inscrire" class="submit" required>
        <a href="?connexion">Formulaire de connexion</a>
    </form>';
}

// TODO L'inscription dans la bdd
?>
