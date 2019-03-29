<?php
$civilite = isset($_POST['civilite']) && !empty($_POST['civilite']) ? $_POST['civilite'] : '';
$nom = isset($_POST['nom']) && !empty($_POST['nom']) ? $_POST['nom'] : '';
$prenom = isset($_POST['prenom']) && !empty($_POST['prenom']) ? $_POST['prenom'] : '';
$adresse = isset($_POST['adresse']) && !empty($_POST['adresse']) ? $_POST['adresse'] : '';
$telephone = isset($_POST['telephone']) && !empty($_POST['telephone']) ? $_POST['telephone'] : '';
$mail = isset($_POST['mail']) && !empty($_POST['mail']) ? $_POST['mail'] : '';
$dtnaissance = isset($_POST['dtnaissance']) && !empty($_POST['dtnaissance']) ? $_POST['dtnaissance'] : '';
$formation = isset($_POST['formation']) && !empty($_POST['formation']) ? $_POST['formation'] : 'N/A';
?>
