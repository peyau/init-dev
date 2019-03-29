<!--
******************************
*         Formulaire         *
******************************
-->
<?php
echo '<pre>';
print_r($_POST); // Outil de débug
print_r($_GET);
echo '</pre>';


$nom = isset($_POST['nom']) && !empty($_POST['nom']) ? $_POST['nom'] : ''; // On appelle ça une ternaire, c'est mettre une condition dans une variable
$prenom = isset($_POST['prenom']) && !empty($_POST['prenom']) ? $_POST['prenom'] : ''; // && !empty fait l'inverse de empty. En gros c'est comme faire empty == false
$civilite = ['Madame', 'Mademoiselle', 'Monsieur', 'Non-binaire'];
$message = isset($_POST['message']) && !empty($_POST['message']) ? $_POST['message'] : '';
$hobby = ['Sport', 'Voyage', 'Lecture'];

// ou if($_POST)
if(count($_POST)>0) { // Si le formulaire est envoyé
  echo "Formulaire envoyé <br><br>";

/*
  $nom='';
  $prenom='';
  if(isset($_POST['nom'])) { // Si "nom" a été envoyé, alors on change la valeur de la variable
    $nom = $_POST['nom'];
  }
  if(isset($_POST['prenom'])) {
    $prenom = $_POST['prenom'];
  }

// Pour faire la condition comme au-dessus, mais en plus court
*/
  $taille = isset($_POST['taille']) && !empty($_POST['taille']) ? $_POST['taille'] : 'N/A';
  $date_de_naissance = '';
  if(isset($_POST['date_de_naissance']) && empty($_POST['date_de_naissance']) == false){
      $date = $_POST['date_de_naissance'];
      //1er solution
      //$date_de_naissance = date('d/m/Y', strtotime($date));
      //2eme solution
      $date_de_naissance = date_format(date_create($date), 'd/m/Y');
  }

echo '';
  foreach($_POST as $key => $valeur) { // Bouclé sur le tableau pour afficher les éléments
    echo "$key $valeur <br>";
  }

} // Fin du if si le formulaire est envoyé

?>
<?php
//if(isset($_GET['visible']) && $_GET['visible']=="formulaire"): // début get (manière différente de faire avec les : et à la fin il faut mettre un endif; )
 ?>
<form action="" method="POST">
  <div>
    <?php
    foreach ($civilite as $valeur) {
      echo "<input type='radio' id='$valeur' name='civilite' value='$valeur'" . (isset($_POST['civilite']) && $_POST['civilite']==$valeur ? 'checked' : '' ). "> <label for='$valeur'> $valeur </label>";
    }
    ?>
  </div>
  <div>
    <label for="nom">Nom</label> <!-- for et id ici permettent de lier les 2, pour que lorsqu'on clique sur "nom" le champ s'active -->
    <input id ="nom" type="text" name="nom" value=<?= $nom ?>> <!-- "name" représente la clé du tableau -->
  </div>
  <div>
    <label for="prenom">Prénom</label>
    <input id="prenom" type="text" name="prenom" value=<?= $prenom ?>> <!-- value=... Permet de garder le champ rempli une fois que le formulaire est envoyé -->
  </div>
  <div>
    <label for="date_de_naissance">Date de naissance</label>
    <input id="date_de_naissance" type="date" name="date_de_naissance" value=<?=$date_de_naissance=isset($_POST['date_de_naissance']) ? $_POST['date_de_naissance'] : ''?>>
  </div>

  <div>
    <label for="hobby">Hobby</label>
    <?php
    echo '<select id="hobby" name="hobby">';
    foreach($hobby as $valeur) {
        echo "<option ". (isset($_POST['hobby']) && $valeur == $_POST['hobby'] ? 'selected': '') . " value='$valeur'>$valeur</option>";
    }
    echo '</select>';
    ?>
  </div>

  <div>
    <label for="taille">Taille</label>
    <?php
    echo '<select id="taille" name="taille">';
    echo "<option>N/A</option>";
    for ($i=0;$i<=200;$i++) {
    echo "<option ". (isset($_POST['taille']) && $i== $_POST['taille'] ? 'selected': '')." value='$i'>$i cm</option>"; // Toute la merde ajoutée, c'est pour enregistrer le champ quand il est envoyé
    }
    echo '</select>';
     ?>
  </div>

  <div>
    <label for="message">Message</label>
    <br><textarea id="message" name="message" placeholder="Indiquez quelque chose" rows=4 cols=50><?= $message ?></textarea> <!-- echo message pour "sauvegarder" le texte dans le textarea -->
  </div>



  <div>
    <input type="reset" value="Réinitialiser">
    <input type="submit" value="Envoyer">
  </div>


</form>

<?php
//endif; // Fin du if get
 ?>

<?php $color = (isset($_POST['civilite']) && ($_POST['civilite'] == 'Monsieur' || $_POST['civilite'] == 'Non-binaire') ? 'lightblue' : 'pink'); ?>
<div style="background:<?= $color ?>"> <!-- permet d'afficher en bleu si la civilité est monsieur ou non binaire et en rose si c'est une femme -->
<?php if($_POST): ?>
<?php
  foreach($_POST as $key => $valeur) {
    echo "$key " . htmlspecialchars($valeur) . "<br>"; // htmlspecialchars permet d'éviter les failles XSS
  }

    if (isset($_POST['taille'])):
        if (($_POST['taille'] <= 100)) {
          echo "Vous êtes petit";
        } elseif (($_POST['taille'] <= 180)) {
          echo "Vous êtes de taille normale";
          }
          else {
            echo "Vous êtes grand";
          }
    endif;

 ?>
<?php endif; ?>
</div>
