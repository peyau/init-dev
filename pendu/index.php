<?php
session_start();
include 'connect.php';
const MAX_ESSAIS = 10;
$alphabet = range('a', 'z');
$_SESSION['essais'] = isset($_SESSION['essais']) ? $_SESSION['essais'] : 0;
//$_SESSION['essais'] = $_SESSION['essais'] ?? 0;
/*unset($_SESSION);
session_destroy();
exit;*/
$tabMot = array();
$req = "SELECT mot FROM mots";
foreach ($bdd->query($req) as $row) {
    $tabMot[] = $row['mot'];
}
implode($tabMot);

if($_SESSION['essais'] === 0) {
  $position = rand(0, count($tabMot)-1);
  $_SESSION['mot'] = $tabMot[$position];
  $explodeWord = str_split($_SESSION['mot']);
  $_SESSION['lettres_mot'] = array_unique($explodeWord);
  $_SESSION['essais'] = MAX_ESSAIS;
  $_SESSION['alphabet'] = range('a', 'z');
  $_SESSION['lettres_utilisees'] = [];
} else if(isset($_POST['lettre'])) {
  //stocker la lettre si elle n'existe pas dans lettres utilisées
  if(!in_array($_POST['lettre'], $alphabet)) {
    echo  "Cette lettre n'est pas valide";
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
      if(
        $_SESSION['essais'] === 0){
        header('location: perdu.php');
        unset($_SESSION['mot']);
        exit;
      }
      echo 'non';
    }
  }
  if (!strstr(str_replace($_SESSION['alphabet'], '_ ', $_SESSION['mot']), '_')) { // S'il n'y a plus d'_ dans le mot caché, alors le joueur a gagné
      header('location: gagne.php');
      $_SESSION['essais'] === 0;
      unset($_SESSION['mot']);
      session_destroy();
  }
}
?>

<br>
<div> Il vous reste <strong><?= $_SESSION['essais'] ?></strong> essais </div>


<form action="" method="post">
<?php
echo str_replace($_SESSION['alphabet'], ' _', $_SESSION['mot']);
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

 <div id="bloc-pendu" style="margin-top: 20px;margin-bottom: 20px;width: 150px; height: 150px; border: 1px solid #000;position: relative">
    <div id="elem1" style="<?= $_SESSION['essais'] <10 ? '' :'display: none;' ?>position: absolute;width: 75px; height:2px;bottom: 20px; left: 20px; background: #000"></div>
    <div id="elem2" style="<?= $_SESSION['essais'] <9 ? '' :'display: none;' ?>position: absolute;width: 2px; height:110px;bottom: 20px; left: 20px; background: #000"></div>
    <div id="elem3" style="<?= $_SESSION['essais'] <8 ? '' :'display: none;' ?>position: absolute;width: 50px; height:2px;top: 20px; left: 20px; background: #000"></div>
    <div id="elem4" style="<?= $_SESSION['essais'] <7 ? '' :'display: none;' ?>position: absolute;width: 2px; height:15px;top: 20px; left: 70px; background: #000"></div>
    <div id="elem5" style="<?= $_SESSION['essais'] <6 ? '' :'display: none;' ?>position: absolute;width: 25px; height:25px; border-radius: 50%;top: 30px; left: 60px; background: #000"></div>
    <div id="elem6" style="<?= $_SESSION['essais'] <5 ? '' :'display: none;' ?>position: absolute;width: 2px; height:40px;top: 50px; left: 70px; background: #000"></div>
    <div id="elem7" style="<?= $_SESSION['essais'] <4 ? '' :'display: none;' ?>position: absolute;width: 2px; height:20px;top: 80px; left: 55px; background: #000;-webkit-transform:translateY(-20px) translateX(5px) rotate(27deg);"></div>
    <div id="elem8" style="<?= $_SESSION['essais'] <3 ? '' :'display: none;' ?>position: absolute;width: 2px; height:20px;top: 80px; right: 75px; background: #000;-webkit-transform:translateY(-20px) translateX(5px) rotate(-27deg);"></div>
    <div id="elem9" style="<?= $_SESSION['essais'] <2 ? '' :'display: none;' ?>position: absolute;width: 2px; height:30px;top: 105px; left: 57px; background: #000;-webkit-transform:translateY(-20px) translateX(5px) rotate(27deg);"></div>
    <div id="elem10" style="<?= $_SESSION['essais'] <1 ? '' :'display: none;' ?>position: absolute;width: 2px; height:30px;top: 105px; right: 75px; background: #000;-webkit-transform:translateY(-20px) translateX(5px) rotate(-27deg);"></div>
 </div>

  <div>
    <label>Lettre</label>
    <input maxlength="1" type="text" name="lettre" value="">
  </div>
  <div>
    <input type="submit" value="Envoyer">
  </div>
</form>
