<html>
<head>
  <title>
    Formulaire jeux vidéo
  </title>
</head>

<body>

<h1>Ajouter un jeu vidéo</h1>

<form action="enreg_jeux_video.php" method="post">

  <p>
    <label for="nom">Nom
    <input id="nom" type="text" name="nom">
  </p>

  <p>
    <label for="possesseur">Possesseur
    <input id="possesseur" type="text" name="possesseur">
  </p>

  <p>
    <label for="console">Console
    <input id="console" type="text" name="console">
  </p>

  <p>
    <label for="prix">Prix
    <input id="prix" type="text" name="prix">
  </p>

  <p>
    <label for="nbre_joueurs_max">Nombre de joueurs max
    <input id="nbre_joueurs_max" type="text" name="nbre_joueurs_max">
  </p>

  <p>
    <label for="commentaires">Commentaire
    <input id="commentaires" type="text" name="commentaires">
  </p>

  <p>
    <input type="submit" value="Envoyer">
    <input type="reset" value="Réinitialiser">
  </p>
  
</form>

</body>

</html>
