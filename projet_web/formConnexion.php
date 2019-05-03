<?php
if(!isset($_SESSION['prenomUtilisateur'])){
    echo '<span class="title">Connexion</span>
    <a href="?cacher" class="noDecoration"><input type="button" class="submit" value="Cacher"></a>
    <form method="post" action="">
        <span class="forme">Identifiant :</span><br>
        <input type="text" name="identifiant" class="champ" required><br>
        <span class="forme">Mot de passe :</span><br>
        <input type="password" name="mdp" class="champ">
        <input type="submit" value="Se connecter" class="submit" required>
        <a href="?inscription">Formulaire d\'inscription</a>
    </form>';
}
else{
    echo '<p class="info">Bonjour ' . ucfirst($_SESSION['prenomUtilisateur']) . '</p>';
    echo '<a href="?deconnexion" class="noDecoration"><input type="button" value="Déconnexion" class="submit"></a>';
}
?>
