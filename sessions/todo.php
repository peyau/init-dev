<?php
// Démarrage de session
session_start();
// Création du cookie
$_SESSION['message']=[];
// Test si le cookie existe
// si oui, on l'edit et on l'incrémente, + on affiche le nombre de fois
if (isset($_SESSION['username'])) {
    echo "Vous êtes connecté. ";
    echo ' <a href="?deconnexion">Deconnexion</a>' . '<br><br>';
} else {
    header('location:login.php'); // Redirection vers la page login
    $_SESSION['message'][]='Vous n\'avez pas accès à cette partie du site.'; // Créé une variable de session (pour la tester dans la page login)
    $_SESSION['message'][]='Vous étiez sur todo.php';
    exit(); // Exit permet d'arrêter le code (ne pas exécuter ce qu'il y a en-dessous)
}

if (isset($_COOKIE['compteur'])){
    $newIndex = $_COOKIE['compteur'] + 1;
    setcookie('compteur', $newIndex, time()+3600);
    echo 'Vous êtes venu ' . $_COOKIE['compteur'] . ' sur la page';
    echo '<br>';
    echo '<a href="?deletecookie">Cliquer</a> pour reset le compteur';
}
// Sinon le créer
else {
    setcookie('compteur', 1, time()+3600);
}

//$_SESSION['todo']=isset($_SESSION['todo']) && is_array($_SESSION['todo']) ? $_SESSION['todo'] : [];


// Initialisation du tableau todo
if(isset($_SESSION['todo'])===false) {
    $_SESSION['todo'] = [];
}

// Récupération des données
if (isset($_POST['todo'])){
    if (in_array($_POST['todo'], $_SESSION['todo'])) { // Vérifie dans le tableau si l'élément existe déjà
        echo "<br>L'élément existe déjà";
    } else {
        $_SESSION['todo'][] = $_POST['todo'];
    }
}


// Pour reset la todo list
if(isset($_GET['reset'])) {
    $_SESSION['todo'] = [];
}

// Supprimer l'élement qu'on veut dans notre liste
if(isset($_GET['delete'])) {
    $index = $_GET['delete'];
    unset($_SESSION['todo'][$index]);
}
// Reset le compteur
if(isset($_GET['deletecookie'])) {
    setcookie('compteur', NULL, -1); // Supprimer le cookie
    header('location: todo.php'); // Rediriger la page sur elle-même
    exit(); // Empêcher le code en-dessous de s'éxecuter
}

// Effacer le premier élément d'un tableau
if(isset($_GET['delfirst']) && count($_SESSION['todo'] > 1)) {
    array_shift($_SESSION['todo']);
    header('location:todo.php');
}

// Effacer le dernier élément d'un tableau
if(isset($_GET['dellast']) && count($_SESSION['todo'] > 1)) {
    array_pop($_SESSION['todo']);
    header('location:todo.php');
}

?>

<form action="todo.php" method="post">
    <input type="text" name="todo" >
    <input type="submit" value="Enregistrer">
</form>
<!-- Lien pour vider notre liste -->
<a href="?reset=false">Reset</a>

<?php
if(isset($_GET['deconnexion'])) {
    session_destroy();
    header('location:login.php'); // Redirection pour que l'URL se recharge et ne garde pas le ?deconnexion en mémoire
    exit();
}

echo '<H1> Todo List</H1>';

    echo '<a href="?delfirst">Effacer le premier élément</a>';
    echo ' | <a href="?dellast">Effacer le dernier élément</a>';

echo '<ul>';
// Afficher les éléments de la todo list
foreach($_SESSION['todo'] as $key => $todo){
    echo "<li style='list-style:none;'><a href='?delete=$key'>&#x274C;</a>$todo</li>";
}
echo '</ul>';
