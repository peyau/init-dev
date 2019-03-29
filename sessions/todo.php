<?php
// Démarrage de session
session_start();
// Création du cookie

// Test si le cookie existe
// si oui, on l'edit et on l'incrémente, + on affiche le nombre de fois
if (isset($_SESSION['username'])) {
    echo 'Connecté';
} else {
    exit('Pas connecté');
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
    $_SESSION['todo'][] = $_POST['todo'];
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

?>

<form action="todo.php" method="post">
    <input type="text" name="todo" >
    <input type="submit" value="Enregistrer">
</form>
<!-- Lien pour vider notre liste -->
<a href="?reset=false">Reset</a>

<?php
echo '<H1> Todo List</H1>';
echo '<ul>';
// Afficher les éléments de la todo list
foreach($_SESSION['todo'] as $key => $todo){
    echo "<li style='list-style:none;'><a href='?delete=$key'>&#x274C;</a>$todo</li>";
}
echo '</ul>';
