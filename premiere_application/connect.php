<?php
// Connexion à la base de données
$hostname='localhost';
$dbname='premiere_appli';
$username='root';
$password='';

try {
$bdd = new PDO ('mysql:host='.$hostname.';dbname=' . $dbname, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
} catch (\Exception $e) {
    echo 'Erreur de connexion à la base de données : ', $e->getMessage();
}
