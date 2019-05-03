<html>
<H1>Addition</H1>
    <form method="post" action="?addition">
        Premier nombre <input type="text" name="nombre1" required> <br>
        Deuxième nombre <input type="text" name="nombre2" required> <br>
        <input type="submit" value="Calculer">
    </form>
</html>

<?php
if (isset($_GET['addition'])){ // Si le paramètre est dans l'URL
    include 'class_addition.php'; // On ajoute la page avec la classe addition
    $calcul = new Addition(); // Création d'un nouvel objet
    $resultat = $calcul->add($_POST['nombre1'], $_POST['nombre2']); // On met les paramètres dans la fonction et on stocke tout ça dans $resutat

    echo 'Le résultat de l\'addition est : ' . $resultat . ' ('. $_POST['nombre1'] . '+' . $_POST['nombre2'] . ')';
};
?>
