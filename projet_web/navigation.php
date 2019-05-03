<!DOCTYPE HTML>
<meta charset=UTF-8>

<html>
<!-- HEAD -->
    <head>
        <LINK rel="stylesheet" href="<CSS/style.css">
    </head>

<!-- BODY -->
<body>
    <nav id="menu">
  	<div>
    	<ul>

            <?php
             if(isset($_GET['connexion'])){
                 echo '<li> <a href="index.php?connexion" title="Accueil">Accueil</a></li>';
             } elseif(isset($_GET['inscription'])) {
                 echo '<li> <a href="index.php?inscription" title="Accueil">Accueil</a></li>';
             } else {
                 echo '<li> <a href="index.php" title="Accueil">Accueil</a></li>';
             }

            if(isset($_GET['connexion'])){
                echo '<li> <a href="services.php?connexion" title="Services">Services</a></li>';
            } elseif(isset($_GET['inscription'])) {
                echo '<li> <a href="services.php?inscription" title="Services">Services</a></li>';
            } else {
                echo '<li> <a href="services.php" title="Services">Services</a></li>';
            }

            if(isset($_GET['connexion'])){
                echo '<li> <a href="tarifs.php?connexion" title="Tarifs">Tarifs</a></li>';
            } elseif(isset($_GET['inscription'])) {
                echo '<li> <a href="tarifs.php?inscription" title="Tarifs">Tarifs</a></li>';
            } else {
                echo '<li> <a href="tarifs.php" title="Tarifs">Tarifs</a></li>';
            }

            if(isset($_GET['connexion'])){
                echo '<li> <a href="contact.php?connexion" title="Contact">Contact</a></li>';
            } elseif(isset($_GET['inscription'])) {
                echo '<li> <a href="contact.php?inscription" title="Contact">Contact</a></li>';
            } else {
                echo '<li> <a href="contact.php" title="Contact">Contact</a></li>';
            }

            if(isset($_GET['connexion'])){
                echo '<li> <a href="reseauxsociaux.php?connexion" title="Réseaux sociaux">Réseaux sociaux</a></li>';
            } elseif(isset($_GET['inscription'])) {
                echo '<li> <a href="reseauxsociaux.php?inscription" title="Réseaux sociaux">Réseaux sociaux</a></li>';
            } else {
                echo '<li> <a href="reseauxsociaux.php" title="Réseaux sociaux">Réseaux sociaux</a></li>';
            }
            ?>
    	</ul>
    </div>
  	</nav>
</body>
</html>
