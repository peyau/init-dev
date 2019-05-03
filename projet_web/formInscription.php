<?PHP

if(!isset($_SESSION['prenomUtilisateur'])){
    echo '<span class="title">Inscription</span>
    <form method="post" action="">
        <span class="forme">Nom :</span><br>
        <input type="text" name="nom" class="champ "><br>
        <span class="forme">Prenom :</span><br>
        <input type="text" name="prenom" class="champ "><br>
        <span class="forme">Adresse mail :</span><br>
        <input type="text" name="mail" class="champ "><br><br>
        <span class="forme">Identifiant :</span><br>
        <input type="text" name="identifiant" class="champ" ><br>
        <span class="forme">Mot de passe :</span><br>
        <input type="password" name="mdp" class="champ" ><br>';

        if(isset($_SESSION['validation']) && $_SESSION['validation']==TRUE){
            echo '<br>Inscription réussie';
            unset($_SESSION['validation']);
        } elseif (isset($_SESSION['validation']) && $_SESSION['validation']==FALSE) {
            echo '<br>Echec de l\'inscription';
            unset($_SESSION['validation']);
        }

        echo '<br><input type="submit" value="S\'inscrire" name="submit" class="submit">
        <a href="?connexion">Formulaire de connexion</a>
    </form>';
}

 ?>
