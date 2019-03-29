<?php
session_start();
const MAX_ESSAIS=10;

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

$lettres=['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'x', 'z'];



if ($_SESSION['essais']==0){
    $nbAleatoire=rand(0, count($mots)-1);
    $_SESSION['mot']=$mots[$nbAleatoire];
    echo 'test';
    $_SESSION['lettreMot']=array_unique(str_split($_SESSION['mot'])); // Explode un mot et supprime les doublons du tableau

    $_SESSION['essais']=MAX_ESSAIS;

    $_SESSION['lettresUtilisees']=[]; // -> Lettre utilisée dans un array_push + vérif sur le tableau après?
} elseif(isset($_POST['lettre'])) {
    if (in_array($_POST['lettre'], $_SESSION['lettresUtilisees'])) { // Si la lettre existe dans le tableau
        echo 'La lettre a déjà été utilisée<br>'; // On affiche qu'elle existe déjà
    } else {
        array_push($_SESSION['lettresUtilisees'], $_POST['lettre']); // Sinon on la met dedans
    }
    //echo $_SESSION['mot'] . '<br>';
    if (strstr($_SESSION['mot'], $_POST['lettre'])) { // Si la lettre existe dans le mot
        echo 'oui';
    } else {
        echo 'non';
    }
}

//echo '<pre>';
//print_r($_SESSION['lettreMot']);
//echo str_replace($lettres, '*', $_SESSION['mot']); // cache les lettres du mot


?>

<form action="" method="post">

<?php
$detail = [];
for ($i=0; $i < strlen($_SESSION['mot']); $i++) {
$detail[] = '_';
}
echo implode($detail, ' ');
?>

<div>
    <label>Lettre </label>
    <input maxlength="1" type="text" name="lettre" value="">
</div>
<div>
    <input type="submit" value="Envoyer">
</div>
</form>
