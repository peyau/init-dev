<?php
session_start();

include 'connect.php';
?>
<!DOCTYPE HTML>
<meta charset=UTF-8>

<html>
<!-- HEAD -->
    <head>
        <link rel="stylesheet" type="text/css" href="CSS/style.css">
    </head>

    <?php

    if(isset($_POST['identifiant']) && isset($_POST['password'])){
        // Préparation de la requête
        $reqConnect = $bdd->prepare("SELECT * FROM utilisateur WHERE identifiant=:identifiant AND mdp=:mdp");
        // Association des valeurs
        $reqConnect->bindValue(':identifiant', $_POST['identifiant'], PDO::PARAM_STR);
        $reqConnect->bindValue(':mdp', $_POST['password'], PDO::PARAM_STR);
        // Exécution
        $reqConnect->execute();
        // Mettre le nombre de résultats retournés dans une variable
        $nbLigne=$reqConnect->rowCount();
        // Vérifier le contenu de cette variable
        if($nbLigne==1){ // Si la requête renvoie quelque chose, on effectue la connexion
            $resultRequete = $reqConnect->fetch();
            $_SESSION['idUtilisateur']=$resultRequete['id'];
        } else {
            //print_r($reqConnect->errorInfo());
            echo '<td>Identifiants incorrects</td>';
        }
    }
    
    ?>

<!-- BODY -->
<body>

    <aside>
        <div class="title">
            Présentation
        </div>
        <p class="police">
            Ce site répertorie les services
        </p>
        <div class="marge">
            <span class="title">Connexion</span>
            <form method="post" action="">
                <span class="forme">Identifiant :</span><br>
                <input type="text" name="identifiant" class="champ"><br>
                <span class="forme">Mot de passe :</span><br>
                <input type="password" name="password" class="champ">
                <input type="submit" value="Envoyer" class="submit">
            </form>
        </div>
    </aside>

</body>
</html>
