<!doctype>
<meta charset=UTF-8>

<html lang="fr-FR" dir="ltr">

    <head>
        <title></title>
        <LINK rel="stylesheet" href="CSS/style.css">
    </head>

<!-- Ouverture du body -->
<body>
<fieldset class="green">
    <legend>Formulaire</legend>
<!-- Début du formulaire -->
<form method="post" action"">
<!-- Début du fieldset global -->
<fieldset class="green">
    <legend>Contact:</legend>

<!-- Fieldset de civilité -->
    <fieldset>
        <legend>Civilité:</legend>
        <!-- Appel des variables PHP stockées dans un autre fichier -->
        <?php include("PHP/variables.php"); ?>
        <?php $civilite = ['M.', 'Mme.', 'Mlle.'];
        foreach ($civilite as $valeur) {
        echo "<input type='radio' id='$valeur' name='civilite' required='required' value='$valeur' class='civilite'" . (isset($_POST['civilite']) && $_POST['civilite']==$valeur ? 'checked' : '' ). "> <label for='$valeur'> $valeur </label>";
        }?>
    </fieldset>
<br>
    <table>
        <tr>
            <td><label for="nom">Nom : </td>
            <td><input id ="nom" type="text" name="nom" required="required" value=<?= $nom ?>><font color="red"> *</font></td>
        </tr>

        <tr>
            <td><label for="prenom">Prénom : </td>
            <td><input id ="prenom" type="text" name="prenom" required="required" value=<?= $prenom ?>><font color="red"> *</font></td>
        </tr>

        <tr>
            <td><label for="adresse">Adresse : </td>
            <td><input id ="adresse" type="text" name="adresse"  placeholder="1 place de la Justice 7700 Mouscron" value=<?= $adresse ?>></td>
        </tr>

        <tr>
            <td><label for="telephone">Téléphone : </td>
            <td><input id ="telephone" type="text" name="telephone" placeholder="Ex: 056238465" value=<?= $telephone ?>></td>
        </tr>

        <tr>
            <td><label for="mail">Email : </td>
            <td><input id ="mail" type="text" name="mail" placeholder="Ex: mail@mail.com" required="required" value=<?= $mail ?>><font color="red"> *</font></td>
        </tr>
    </table>
</fieldset>
<!-- Fieldset d'informations personnelles -->
<fieldset>
    <legend>Informations personnelles:</legend>

    <table>
    <tr>
        <td><label for="dtnaissance">Date de naissance : </td> <td><input id ="dtnaissance" type="date" name="dtnaissance" value=<?= $dtnaissance ?>></td>
    </tr>
        <tr>
        <td><label for="formation">Formation : </td>
        <td>
        <select id="formation" name="formation" value=<?= $formation ?>>

        <optgroup label="LMD">
            <?php $options1 = ['Bachelor', 'Master', 'Docteur'];
            foreach ($options1 as $valeur) {
                echo '<option value=' . $valeur . '>' . $valeur . '</option>';
            }
            ?>

        </optgroup>
            <optgroup label="Cycle d'ingénieurs">
            <?php $options2 = ['Préparatoire', 'Première', 'Deuxième', 'Troisième'];
            foreach ($options2 as $valeur) {
                echo '<option value=' . $valeur . '>' . $valeur . '</option>';
            }
            ?>
        </optgroup>

        <optgroup label="Autre">
            <?php $options3 = ['Autre1', 'Autre2'];
            foreach ($options3 as $valeur) {
                echo '<option value=' . $valeur . '>' . $valeur . '</option>';
            }
            ?>
        </optgroup>
        </td>
    </tr>

</table>
</fieldset>

<!-- Fieldset compétences -->
<fieldset>
    <legend>Compétences:</legend>

    <table>
        <tr>
            <td>Technologie(s):</td>
            <td>
                <ul>
                    <?php $liste=['ASP.NET', 'PHP', 'JEE'];
                    foreach($liste as $key=>$value) {
                        echo '<li class="invisible"><input type="checkbox" name="technologie' . $key . '"  value=' . $value . '>' . $value . '</li>';
                    }
                    ?>
                </ul>
            </td>
        </tr>

        <tr>
            <td>Niveau HTML5:</td>
            <td><input type="range" style="margin-left:15%" name="niveauhtml"></td>
        </tr>

        <tr>
            <td>Niveau CSS3:</td>
            <td><input type="range" style="margin-left:15%" name="niveaucss"></td>
        </tr>

        <tr>
            <td>Niveau JavaScript:</td>
            <td><input type="range" style="margin-left:15%" name="niveaujs"></td>
        </tr>
    </table>

</fieldset>

<table>
    <tr>
        <td>Fichier</td>
        <td><input type="file" value="Choisir un fichier"</td>
    </tr>

    <tr>
        <td>Message</td>
        <td><textarea name="message" placeholder="Notez votre message ici" rows=5 cols=40 required="required"></textarea></td><td><font color="red"> *</font></td>
    </tr>
</table>



<!-- Fin du fieldset global et du formulaire -->
<!-- Fieldset compétences -->
<input type="submit">
</form>

</fieldset>
</body>
</html>
