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
            if (isset($_GET['connexion'])){
                include 'formConnexion.php';
            } elseif (isset($_GET['inscription'])) {
                include 'formInscription.php';
            }
            if (!isset($_GET['connexion']) && !isset($_GET['inscription'])){
                echo '<a href="?connexion" class="noDecoration"><input type="button" value="Formulaire" class="submit"></a>';
            }
            ?>
        </div>
    </aside>

</body>
</html>
