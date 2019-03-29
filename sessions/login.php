<?php
session_start();
$username = 'étudiant';
$password = '1234';

if(isset($_GET['deconnexion'])) {
    session_destroy();
    header('location:login.php');
    exit();
}

if (isset($_POST['username'], $_POST['password'])
&& $_POST['username']===$username
&& $_POST['password']===$password){
    echo 'Identifiants corrects';
    $_SESSION['username']=$_POST['username'];
    echo ' <a href="?deconnexion">Deconnexion</a>';
    exit();
} else {
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
