<?php
session_start();
include 'connect.php';
const POINTS_MANCHE=5;
?>

<html>

<head>
    <title>Shi-Fu-Mi</title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css" />
</head>

<body>


<?php
/*
unset($_SESSION['cptVicOrdi']);
unset($_SESSION['cptVicJoueur']);
unset($_SESSION['cptVicConsecJoueur']);
*/
// Fonction pour reset les compteurs


if(isset($_SESSION['nomJoueur'])):
function resetCpt(){
    $_SESSION['cptJoueur'] = 0;
    $_SESSION['cptOrdi'] = 0;
    $_SESSION['cptEgalite'] = 0;
}

 // Création du tableau avec les valeurs
$tirageOrdi=['Pierre', 'Feuille', 'Ciseaux'];
shuffle($tirageOrdi); // Mélange

// Si les variables de SESSION pour les victiores n'existent pas, on les créé
if(!isset($_SESSION['cptVicOrdi'])){
    $_SESSION['cptVicOrdi']=0;
}
if(!isset($_SESSION['cptVicJoueur'])){
    $_SESSION['cptVicJoueur']=0;
}
if(!isset($_SESSION['cptVicConsecJoueur'])){
    $_SESSION['cptVicConsecJoueur']=0;
}

 // Création du tableau avec les valeurs (en deux tableau pour éviter d'avoir un shuffle des boutons radio)
//$tirageJoueur=['Pierre', 'Feuille', 'Ciseaux'];

// Si reset est envoyé dans l'URL, on supprimer les variables de SESSION (les compteurs)
if(isset($_GET['reset'])) {
    resetCpt();
    header('location:jeu.php');
}

// Si les variables n'existent pas alors les créer
if(!isset($_SESSION['cptJoueur']) && !isset($_SESSION['cptOrdi']) && !isset($_SESSION['cptEgalite'])){
    $_SESSION['cptJoueur'] = 0;
    $_SESSION['cptOrdi'] = 0;
    $_SESSION['cptEgalite'] = 0;
}

// Deconnexion de la session
if(isset($_GET['disconnect'])){
    session_destroy();
    header('Refresh:1;url=index.php');
    /*
    echo '<script language="javascript">';
    echo 'confirm(\'Vous allez être redirigé\')';
    echo '</script>';*/

}
// Série de conditions pour les victoires/défaites
if(isset($_POST['choix'])):
    if ($_POST['choix'] == $tirageOrdi[0]){
        $_SESSION['cptEgalite']++;
    	$affiche_result = '<b><font color="blue">Egalité</font></b>' . '<br>';
        // Pour les statistiques
        if ($tirageOrdi[0] == 'Pierre'){
            $reqStat = $bdd->prepare('UPDATE statistiques SET nombre=nombre+1 WHERE choix=\'Pierre\'');
            $reqStat->execute();
        } elseif ($tirageOrdi[0] == 'Feuille') {
            $reqStat = $bdd->prepare('UPDATE statistiques SET nombre=nombre+1 WHERE choix=\'Feuille\'');
            $reqStat->execute();
        } elseif ($tirageOrdi[0] == 'Ciseaux'){
            $reqStat = $bdd->prepare('UPDATE statistiques SET nombre=nombre+1 WHERE choix=\'Ciseaux\'');
            $reqStat->execute();
        }
    }
    // If's joueur win
    elseif (($_POST['choix'] == 'Pierre' && $tirageOrdi[0] == 'Ciseaux')
        || ($_POST['choix'] == 'Feuille' && $tirageOrdi[0] == 'Pierre')
        || ($_POST['choix'] == 'Ciseaux' && $tirageOrdi[0] == 'Feuille')){
            $_SESSION['cptJoueur']++;
    		$affiche_result = '<b><font color="green">Vous avez gagné cette manche</font></b>' . '<br>';
        // Pour Pour les statistiques
        if ($tirageOrdi[0] == 'Pierre'){
            $reqStat = $bdd->prepare('UPDATE statistiques SET nombre=nombre+1 WHERE choix=\'Pierre\'');
            $reqStat->execute();
        } elseif ($tirageOrdi[0] == 'Feuille') {
            $reqStat = $bdd->prepare('UPDATE statistiques SET nombre=nombre+1 WHERE choix=\'Feuille\'');
            $reqStat->execute();
        } elseif ($tirageOrdi[0] == 'Ciseaux'){
            $reqStat = $bdd->prepare('UPDATE statistiques SET nombre=nombre+1 WHERE choix=\'Ciseaux\'');
            $reqStat->execute();
        }
    }

    // If's ordi win
    elseif (($_POST['choix'] == 'Ciseaux' && $tirageOrdi[0] == 'Pierre')
        || ($_POST['choix'] == 'Pierre' && $tirageOrdi[0] == 'Feuille')
        || ($_POST['choix'] == 'Feuille' && $tirageOrdi[0] == 'Ciseaux')){
            $_SESSION['cptOrdi']++;
    		$affiche_result = '<b><font color="red">Vous avez perdu cette manche</font></b>' . '<br>';
        // Pour les statistiques
        if ($tirageOrdi[0] == 'Pierre'){
            $reqStat = $bdd->prepare('UPDATE statistiques SET nombre=nombre+1 WHERE choix=\'Pierre\'');
            $reqStat->execute();
        } elseif ($tirageOrdi[0] == 'Feuille') {
            $reqStat = $bdd->prepare('UPDATE statistiques SET nombre=nombre+1 WHERE choix=\'Feuille\'');
            $reqStat->execute();
        } elseif ($tirageOrdi[0] == 'Ciseaux'){
            $reqStat = $bdd->prepare('UPDATE statistiques SET nombre=nombre+1 WHERE choix=\'Ciseaux\'');
            $reqStat->execute();
        }
    }

endif;

// Affichage des compteurs
echo '<div class="global">';
echo '<div class="centrer">';

echo 'Compteur de points : <br>';
echo 'Joueur : ' . $_SESSION['cptJoueur'] . ' | Ordinateur : ' . $_SESSION['cptOrdi'] . ' | Egalité : ' . $_SESSION['cptEgalite'] . '<br><br>';

$reqJoueurVic = $bdd->prepare('UPDATE joueur SET vic=vic+1, victot=victot+1 WHERE nom=:joueur AND pwd=:pwd');
$reqJoueurVic->bindValue(':joueur', $_SESSION['nomJoueur'], PDO::PARAM_STR);
$reqJoueurVic->bindValue(':pwd', $_SESSION['pwdJoueur'], PDO::PARAM_STR);


$reqJoueurVicTot = $bdd->prepare('UPDATE joueur SET victot=victot*0, vicordi=vicordi+1 WHERE nom=:joueur AND pwd=:pwd');
$reqJoueurVicTot->bindValue(':joueur', $_SESSION['nomJoueur'], PDO::PARAM_STR);
$reqJoueurVicTot->bindValue(':pwd', $_SESSION['pwdJoueur'], PDO::PARAM_STR);


// Si le joueur gagne
if ($_SESSION['cptJoueur']==POINTS_MANCHE){
    echo '<h4 style="color:green;">Victoire</h4>';
    $finDuGame=''; // Création de la variable pour prévenir que c'est la fin du jeu
    resetCpt(); // Reset les compteurs

    $reqJoueurVic->execute();
    //$_SESSION['cptVicJoueur']=$_SESSION['cptVicJoueur']+1;
    //$_SESSION['cptVicConsecJoueur'] = $_SESSION['cptVicConsecJoueur']+1;
}
// Si l'ordi gagne

elseif ($_SESSION['cptOrdi']==POINTS_MANCHE){
    echo '<h4 style="color:red;">Défaite</h4>';
    $finDuGame=''; // Création de la variable pour prévenir que c'est la fin du jeu
    resetCpt(); // Reset les compteurs
    //$_SESSION['cptVicOrdi']=$_SESSION['cptVicOrdi']+1;
    $reqJoueurVicTot->execute();
    //$_SESSION['cptVicConsecJoueur']=0;
}

// Si la variable n'est pas vide, afficher le texte
if (!empty($affiche_result)){
	echo $affiche_result;
    echo 'Vous avez choisi : <b>' . $_POST['choix'] . '</b><br>';
    echo "L'ordinateur a choisi : <b>" . $tirageOrdi[0] . "</b><br><br>";
    }

// Création du formulaire pour lancer le jeu
echo '<form method="post" action="">';

/* Afficher les boutons en fonction de ce qu'il y a dans le tableau, pas nécessaire de le faire avec un foreach, mais pour l'entraînement
foreach ($tirageJoueur as $valeur) {
    echo "<input type='radio' id='$valeur' name='choix' value='$valeur' required> <label for='$valeur'> $valeur </label> <br>";
}*/
// Il n'est plus fait avec un foreach car on ne peut pas mettres d'images dans un tableau
    echo "<input type='radio' id='Pierre' name='choix' value='Pierre' required> <label for='Pierre'> <img src='images/pierre.png' class='choix'> </label>";
    echo "<input type='radio' id='Feuille' name='choix' value='Feuille' required> <label for='Feuille'> <img src='images/feuille.png' class='choix'> </label>";
    echo "<input type='radio' id='Ciseaux' name='choix' value='Ciseaux' required> <label for='Ciseaux'> <img src='images/ciseaux.png' class='choix'> </label> <br>";


// Afficher le bouton submit si la variable $finDuGame n'existe pas
    if (!isset($finDuGame)){
        echo '<br><input type="submit">';
        echo '<br><a href="?reset"><input type="button" value="Reset les compteurs" onClick="return(confirm(\'Etes-vous sûr? Vous allez supprimer les compteurs\'));"></a>'; // Demande de confirmation avant de reset les compteurs
    } else { // Sinon afficher un bouton d'actualisation de la page
        echo '<br><font size="2"><i>Il faut actualiser <br>la page pour rejouer</i></font>';
        echo '<br><a href="jeu.php"><input type="button" value="Actualiser la page"></a>';
    }

echo '</form>';
echo '</div>';


// *****************************************************************************
// **                         Div pour les stats                              **
// *****************************************************************************

// Affichage des statistiques
echo '<div class="centrer">';
// Affichage des stats de l'ordi
$reqDisplayStat=$bdd->prepare('SELECT * FROM statistiques');
$reqDisplayStat->execute();
echo '<p>L\'ordinateur a choisi :</p>';

// Affichage du nombre de fois que l'ordi a sorti son choix
while ($valeur = $reqDisplayStat->fetch()){
    echo '<b>' . $valeur['choix'] . '</b> : ' . $valeur['nombre'] . ' fois<br>';
}

// On prépare l'affichage du nombre de victoires de l'ordi contre l'utilisateur et on l'affiche
$reqDisplayVicOrdi=$bdd->prepare('SELECT vicordi from joueur WHERE nom=:joueur and pwd=:pwd');

$reqDisplayVicOrdi->bindValue(':joueur', $_SESSION['nomJoueur'], PDO::PARAM_STR);
$reqDisplayVicOrdi->bindValue(':pwd', $_SESSION['pwdJoueur'], PDO::PARAM_STR);

$reqDisplayVicOrdi->execute();

while ($donnees = $reqDisplayVicOrdi->fetch()) {
echo '<br>Et il a gagné <b>' . $donnees['vicordi'] . '</b> fois contre vous<br>';
}

// Affichage des stats du joueur
$reqDisplayJoueur=$bdd->prepare('SELECT * FROM joueur WHERE nom=:joueur and pwd=:pwd');

$reqDisplayJoueur->bindValue(':joueur', $_SESSION['nomJoueur'], PDO::PARAM_STR);
$reqDisplayJoueur->bindValue(':pwd', $_SESSION['pwdJoueur'], PDO::PARAM_STR);

$reqDisplayJoueur->execute();

while ($donnees = $reqDisplayJoueur->fetch()) {
echo 'Vous avez gagné <b>' . $donnees['vic'] . '</b> fois contre lui<br><br>';
echo '<b>' . $donnees['victot'] . '</b> victoires consécutives pour vous';
}

echo '<br><br>';
echo '<a href="?disconnect">Se déconnecter de la session</a>';
echo '</div>';
echo '</div>';

// *****************************************************************************
// **                             Scoreboard                                  **
// *****************************************************************************

echo '<div class="scoreboard">';
$reqScoreboard=$bdd->prepare('SELECT nom, victot from joueur  WHERE niveau <> 2 ORDER BY victot DESC'); // WHERE pour ne pas afficher l'admin
$reqScoreboard->execute();
echo '<p><b>Meilleur joueur: </b></p>';
echo '<table width="80%" align="center" style="margin-left:15%;">';
echo '<tr>
        <th>Nom</th>
        <th>Victoires consécutives</th>
    </tr>';
while ($score = $reqScoreboard->fetch()){
    echo '<tr>
        <td style="text-align:center;">' . $score['nom'] . '</td><td style="text-align:center;">'. $score['victot'] . '</td>
        </tr>';
}
echo '</table>';

// Si l'admin est connecté
$reqDisplayJoueur->execute();
while ($donnees = $reqDisplayJoueur->fetch()){
    if ($donnees['niveau']==2){
        echo '<p style="margin-top:80%;">Vous êtes connecté en mode admin<br>
        <a href="http://127.0.0.1/phpmyadmin" target=\'_blank\'><input type="button" value="Accéder à la base de données"></a></p>';
    }
}

echo '</div>';
else: // Si l'utilisateur n'est pas connecté au formulaire
echo 'Vous devez vous connecter <a href="index.php">ici</a>';
endif;

?>

</body>
</html>
