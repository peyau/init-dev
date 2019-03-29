<meta charset=UTF-8>
<html>
<head>
  <title>
    Formulaire client
  </title>
</head>

<body>

<h1>Ajouter un client</h1>

<form action="enreg_client.php" method="post">
  <p>
    <label for="nom">Nom
    <input id="nom" type="text" name="nom_cli">
  </p>

  <p>
    <label for="prenom">Prenom
    <input id="prenom" type="text" name="pre_cli">
  </p>

  <p>
    <label for="adresse">Adresse
    <input id="adresse" type="text" name="adr_cli">
  </p>

  <p>
    <label for="telephone">Téléphone
    <input id="telephone" type="text" name="tel_cli">
  </p>

  <p>
    <input type="submit" value="Envoyer">
    <input type="reset" value="Réinitialiser">
  </p>
</form>
</html>
