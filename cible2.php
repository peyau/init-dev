<?php


if(isset($_GET['nb1']))
  {
    echo 'Voici nb1 ' . $_GET['nb1'] . '<br>';
  }   else if (isset($_GET['nb2']))
  {
    echo 'Voici nb2 ' . $_GET['nb2'];
  }   else {
    echo 'Rien n\'a été envoyé';
  }

// echo $_GET['nb1'] + $_GET['nb2'];  ça c'est pour faire une addition en entrant les données dans l'url
