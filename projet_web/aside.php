<?php
session_start();
$_SESSION['test']='Bonjour';
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
if(isset($_POST['identifiant']) && isset($_POST['mdp'])){
    // Préparation de la requête
    $reqConnect = $bdd->prepare("SELECT * FROM utilisateur WHERE identifiant=:identifiant AND mdp=:mdp");
    // Association des valeurs
    $reqConnect->bindValue(':identifiant', $_POST['identifiant'], PDO::PARAM_STR);
    $reqConnect->bindValue(':mdp', $_POST['mdp'], PDO::PARAM_STR);
    // Exécution
    $reqConnect->execute();
    // Mettre le nombre de résultats retournés dans une variable
    $nbLigne=$reqConnect->rowCount();
    // Vérifier le contenu de cette variable
    if($nbLigne==1){ // Si la requête renvoie quelque chose, on effectue la connexion
        $resultRequete = $reqConnect->fetch();
        $_SESSION['prenomUtilisateur']=$resultRequete['prenom'];
    } else {
        //print_r($reqConnect->errorInfo());
        echo '<td>Identifiants incorrects</td>';
    }
}

if (isset($_GET['deconnexion'])){
    session_unset();
    header("location: ".$_SERVER["PHP_SELF"]); // Pour rafraichir la page active
}

if (isset($_GET['inscription'])){
    header("location:formInscription.php"); 
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
            <?php
            if(!isset($_SESSION['prenomUtilisateur'])){
                echo '<span class="title">Connexion</span>
                <form method="post" action="">
                    <span class="forme">Identifiant :</span><br>
                    <input type="text" name="identifiant" class="champ"><br>
                    <span class="forme">Mot de passe :</span><br>
                    <input type="password" name="mdp" class="champ">
                    <input type="submit" value="Se connecter" class="submit">
                    <a href="?inscription" class="noDecoration"><input type="button" value="S\'inscrire" class="submit"></a>
                </form>';
            }
            else{
                echo '<p class="info">Bonjour ' . ucfirst($_SESSION['prenomUtilisateur']) . '</p>';
                echo '<a href="?deconnexion" class="noDecoration"><input type="button" value="Déconnexion" class="submit"></a>';
            }
            ?>
        </div>
    </aside>

</body>
</html>
