<?php

session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>SpaceY | Vente de CD</title>
        <link rel="stylesheet" href="css/main.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    </head>

    <body>

    <div class="bandeau-front">
        <h1 class="bandeau-front-titre">SPACE<span style="color:coral;">Y<span></h1>
        <span class="bandeau-front-description">La musique pour les voyageurs</span>
        <span class="bandeau-menu"><a class="bandeau-menu-a" href="index.php">Accueil</a> | <a class="bandeau-menu-a" href="panier.php">Panier</a></span>
    </div>

    <?php
    /**
     * Nom: index.php
     * Auteur: Mathieu Derrit & Antonin Maystre
     * Objectif: Afficher les CD disponibles à la vente
     * Version: 1.0
     */


    echo '<h3 class="contenue-titre">Votre panier</h1>';
    if(isset($_SESSION['panier'])){
        $panier = $_SESSION['panier'];
        for($i=0;$i<count($panier);$i++){
            echo $panier[$i];
        }
    }else {
        echo "Panier vide";
    }
    echo '<a href="suppressionPanier.php">Supression pannier</a>';
    echo '<a href="index.php">acueil</a>';

    ?>

    </body>

</html>