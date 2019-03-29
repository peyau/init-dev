<html>
<head>
  <title>
    Formulaire client
  </title>
</head>

<body>

<h1>Ajouter un article</h1>

<form action="enreg_article.php" method="post">

  <p>
    <label for="designation">Désignation de l'article
    <input id="designation" type="text" name="design_art">
  </p>

  <p>
    <label for="prix">Prix de l'article
    <input id="prix" type="text" name="prix_art">
  </p>

  <p>
    <input type="submit" value="Envoyer">
    <input type="reset" value="Réinitialiser">
  </p>
</form>

</body>

</html>
