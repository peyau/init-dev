<?php
session_start();
const MAX_ESSAIS = 10;
$alphabet = range('a', 'z');

$_SESSION['essais'] = isset($_SESSION['essais']) ? $_SESSION['essais'] : 0;
//$_SESSION['essais'] = $_SESSION['essais'] ?? 0;
/*unset($_SESSION);
session_destroy();
exit;*/
$mots  = [
  "coquelicot",
  "cinema",
  "patate",
  "reminiscence",
  "chat",
  "doubleur",
  "chinoises",
  "bijouterie"
];
if($_SESSION['essais'] === 0) {
/*  if(isset($_SESSION['mot'])){
    header('refresh: 5; url= index.php');
    echo "vous avez perdu";
    exit;
  }*/
  $position = rand(0, count($mots)-1);
  $_SESSION['mot'] = $mots[$position];
  $explodeWord = str_split($_SESSION['mot']);
  $_SESSION['lettres_mot'] = array_unique($explodeWord);
  $_SESSION['essais'] = MAX_ESSAIS;
  $_SESSION['alphabet'] = range('a', 'z');
  $_SESSION['lettres_utilisees'] = [];
} else if(isset($_POST['lettre'])) {

  //stocker la lettre si elle n'existe pas dans lettres utilisées
  if(!in_array($_POST['lettre'], $alphabet)){
      echo 'Ce n\'est pas une lettre de l\'alphabet';
  }
  else if(in_array($_POST['lettre'], $_SESSION['lettres_utilisees'])) {
    echo  "Vous avez déjà utilisé cette lettre";
  } else {
    $_SESSION['lettres_utilisees'][] = $_POST['lettre'];
    $index = array_search($_POST['lettre'], $_SESSION['alphabet']);
    unset($_SESSION['alphabet'][$index]);
    if(strpos($_SESSION['mot'], $_POST['lettre']) !== false) {
      echo 'oui';
    } else {
      $_SESSION['essais']--;
      echo 'non';
    }
  }
}
?>

<br>
<div> Il vous reste <strong><?= $_SESSION['essais'] ?></strong> essais </div>


<form action="" method="post">
<?php
echo str_replace($_SESSION['alphabet'], '_', $_SESSION['mot']);
/*
  $detail = [];
  for($i=0; $i<strlen($_SESSION['mot']); $i++) {
    if(in_array($_SESSION['mot'][$i], $_SESSION['lettres_utilisees'])){
      $detail[] = $_SESSION['mot'][$i];
    } else {
      $detail[] = '_';
    }
  }
  echo implode($detail, ' ');
  */
 ?>
  <div>
    <label>Lettre</label>
    <input maxlength="1" type="text" name="lettre" value="">
  </div>
  <div>
    <input type="submit" value="Envoyer">
  </div>
</form>
