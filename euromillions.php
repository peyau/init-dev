<?php

function euromillion(){
  $tableau = range(1,50);
  $tableau2 = range(1,12);
  shuffle($tableau);
  shuffle($tableau2);
  echo implode(', ', array_slice($tableau, 0, 5)); // array_slice permet de choisir les x éléments du tableau
  echo '<br>';
  echo implode(', ', array_slice($tableau2, 0, 2)); // implode permet de séparer les valeurs par une ', '
/*
    for($cpt1=0;  $cpt1<5; $cpt1++){
        echo $tableau[$cpt1]. '';
    }
    echo '<br>';
    for ($cpt2=0;$cpt2<2;$cpt2++){
        echo $tableau[$cpt2].' ';
    }
*/
}

euromillion();
