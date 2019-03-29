<?php
session_start();
const MAX_ESSAIS=10;

//session_destroy();
$_SESSION['essais'] = isset($_SESSION['essais']) ? $_SESSION['essais'] : 0;
//$_SESSION['essais'] = $_SESSION['essais'] ?? 0;

$mots = [
    'coquelicot',
    'cinema',
    'patate',
    'reminiscence',
    'chat',
    'doubleur',
    'chinoises',
    'bijouterie'
];

if ($_SESSION['essais']==0){
    $nbAleatoire=rand(0, count($mots)-1);
    $_SESSION['mot']=$mots[$nbAleatoire];
    //echo 'test';
    $_SESSION['lettreMot']=array_unique(str_split($_SESSION['mot'])); // Explode un mot et supprime les doublons du tableau

    $_SESSION['alphabet']=['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'x', 'z'];
    $_SESSION['essais']=MAX_ESSAIS;

    $_SESSION['lettresUtilisees']=[]; // -> Lettre utilisée dans un array_push + vérif sur le tableau après?

} elseif(isset($_POST['lettre']) && !empty($_POST['lettre'])) {
    if (in_array($_POST['lettre'], $_SESSION['lettresUtilisees'])) { // Si la lettre existe dans le tableau
        echo 'La lettre a déjà été utilisée<br>'; // On affiche qu'elle existe déjà
    } else {
        array_push($_SESSION['lettresUtilisees'], $_POST['lettre']); // Sinon on la met dedans
    }
    //echo $_SESSION['mot'] . '<br>';
    if (strstr($_SESSION['mot'], $_POST['lettre'])) { // Si la lettre existe dans le mot
        //echo 'oui<br>';
        unset($_SESSION['alphabet'][array_search($_POST['lettre'], $_SESSION['alphabet'])]); // Si la lettre est dans le mot, on supprime cette lettre de la variable $_SESSION['alphabet']
        if (!strstr(str_replace($_SESSION['alphabet'], '_ ', $_SESSION['mot']), '_')) { // S'il n'y a plus d'_ dans le mot caché, alors le joueur a gagné
            echo 'Vous avez gagné<br>';
            echo '<a href="">Actualiser la page</a><br>';
            echo 'Le mot était : ';
        }
    } else {
        //echo 'non<br>';
        $_SESSION['essais']--;
        if ($_SESSION['essais']==0){
            echo 'Vous avez perdu<br>';
            echo '<a href="">Actualiser la page</a><br>';
            $_SESSION['alphabet']=[];
            echo 'Le mot était : ' . str_replace($_SESSION['alphabet'], '_ ', $_SESSION['mot']);
        }
    }
}

//echo '<pre>';
//print_r($_SESSION['lettreMot']);
//print_r($_SESSION['alphabet']);
if (!$_SESSION['essais']==0){
    echo str_replace($_SESSION['alphabet'], '_ ', $_SESSION['mot']); // cache les lettres du mot
}
if (!strstr(str_replace($_SESSION['alphabet'], '_ ', $_SESSION['mot']), '_')) { // Si dans le mot caché il n'y a plus de _, ça veut dire que le joueur a gagné et donc on reset tout pour une nouvelle partie
    $_SESSION['essais']=MAX_ESSAIS;
    $nbAleatoire=rand(0, count($mots)-1);
    $_SESSION['mot']=$mots[$nbAleatoire];
    $_SESSION['alphabet']=['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'x', 'z'];  // Le tableau est à nouveau rempli
    $_SESSION['lettresUtilisees']=[]; // Reset les lettres utilisées
}

?>

<form action="" method="post">

<?php
//$detail = [];
//for ($i=0; $i < strlen($_SESSION['mot']); $i++) {
//$detail[] = '_';
//}
//echo implode($detail, ' ');
?>

<div>
    <label>Lettre </label>
    <input maxlength="1" type="text" name="lettre" value="">
</div>
<div>
    <input type="submit" value="Envoyer">
</div>
</form>
<?php
echo 'Essais restants : ' . $_SESSION['essais']; ?>
