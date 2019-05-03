<?php
session_start();
$username = 'étudiant';
$password = '1234';

if(isset($_GET['deconnexion'])) {
    session_destroy();
    header('location:login.php'); // Le header doit être utilisé avant qu'il y ait du texte sur la page
    exit();
}

if(isset($_SESSION['message'])) {
    echo implode('<br>', $_SESSION['message']);
    unset($_SESSION['message']); // Suppression de cette variable pour que le message ne s'affiche qu'une fois
}

if (isset($_POST['username'], $_POST['password'])
&& $_POST['username']===$username
&& $_POST['password']===$password){
    header('location:todo.php');
    echo 'Identifiants corrects';
    $_SESSION['username']=$_POST['username'];
    echo ' <a href="?deconnexion">Deconnexion</a>';
    exit();
} else if($_POST) {
    echo 'Identifiants incorrects';
}

 ?>

<form action="" method="post">

    <div>
        <label>Username</label>
        <input type="text" name="username">
    </div>

    <div>
        <label>Password</label>
        <input type="password" name="password">
    </div>
    <div>
    <label>Envoyer</label>
    <input type="submit" value="Connexion">
    </div>

</form>
