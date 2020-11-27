<?php
    /**
     * Nom: panier.php
     * Auteur: Mathieu Derrit & Antonin Maystre
     * Objectif: Afficher le panier actuel
     * Version: 1.0
     */

    // On démarre la session
    session_start();

?>

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
    // On affiche le titre de la page
    echo '<h3 class="contenue-titre">Votre panier</h1>';
    echo '<div class="main">';

    //  On vérifie si il un panier a été déclarer
    if(isset($_SESSION['panier'])){
        
        // On récupère le panier
        $panier = $_SESSION['panier'];

        // On vérifie si le panier est vide
        $longueurTableau=count($panier);
        if($longueurTableau<1){
            
            // Si il est vide on affiche qu'il l'est
            echo "Panier vide";
        }else{
            // On créer le tableau pour afficher
            echo '<table class="panier">';
            echo '<tr>';
            echo '<th> Titre du cd </th>';
            echo '<th> Prix </td>';
            echo '</tr>';
            // Sinon on affiche le contenue du panier
            for($i=0;$i<count($panier);$i++){
                echo '<tr>';
                echo '<td>';
                echo $panier[$i];
                echo '</td>';
                echo '<td>';
                
                echo '</td>';
                echo '</tr>';
            }
            
            // On finis le tableau
            echo '</table>';
        }
    }else {

        // Si il n'est pas déclaré alors on affiche qu'il est vide
        echo "Panier vide";
    }

        echo '<a href="suppressionPanier.php">Supression pannier</a>';

    ?>
    <div>
    </body>
</html>