<?php
session_start();
//setcookie('pseudo', 'Toto', time() + 365*24*3600); // Créer un cookie
// echo $_SESSION['nom'];

echo $_COOKIE['pseudo']; // afficher le cookie
