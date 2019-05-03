<?php
include 'navigation.php';
include 'aside.php';


if(isset($_SESSION['prenomUtilisateur'])){
    echo $_SESSION['prenomUtilisateur'];
} else {

}
?>
