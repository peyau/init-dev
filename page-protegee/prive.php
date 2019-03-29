<?php
if (isset($_POST['login'], $_POST['password']) && $_POST['login']==='IEPSM' && $_POST['password']==='annee2019'){
        echo 'Vous avez accès à la partie privée';
    }else {
      echo 'Vous avez accès à la partie publique';
    }
