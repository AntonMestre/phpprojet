<?php

    /**
     * Nom: index.php
     * Auteur: Mathieu Derrit & Antonin Maystre
     * Objectif: Afficher les CD disponibles à la vente
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
        <span class="bandeau-menu"><a class="bandeau-menu-a" href="index.php">Accueil</a> | <a class="bandeau-menu-a" href="panier.php">Panier</a> | 
        <?php if(isset($_SESSION['email']))
        { 
            // Si connecté alors on propose management ou deconnexion
            echo '<a class="bandeau-menu-a" href="deconnexion.php">Deconnexion</a>'; 
            echo ' | <a class="bandeau-menu-a" href="management.php">Management</a>';
        }
        else {
            // Si pas connecté on propose la connexion ou l'inscription
            echo '<a class="bandeau-menu-a" href="connexion.php">Connexion</a>';
            echo ' | <a class="bandeau-menu-a" href="inscription.php">Inscription</a>';
            } ?></span>
    </div>

    <?php

    // On intègre les variables pour la connexion de la base de données
    include 'bd_identifiant.php';

    // On affiche le titre et on commence le tableau dans lequel on mettra les différents cd
    echo '<h3 class="contenue-titre">Les CD à  l\'affiche cette semaine</h1>';
    echo '<table class="affiche">';

    // On effectue une tentative de connexion à la base de données
    try {

        // $connexion nous permet de se connecter à la base de données
        $connexion   =   new   PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_bdd,   $PARAM_user,$PARAM_pw);

        // On sélectionne les 5 premiers cd de la base de données
        $resultats=$connexion->query("SELECT * FROM cd LIMIT 5");
        $resultats->setFetchMode(PDO::FETCH_OBJ);

        // Tant qu'il y a des résultats (de la requête) on affiche: l'image générée,le groupe/artiste et deux boutons (details et ajout panier)
        while($tuple= $resultats->fetch()) {
            echo '<td class="td-padding">';
            echo '<table>';
                echo '<tr>';
                    echo '<td>';
                        // On affiche les images générées à partir de la page générationVignette.php (format: 125x125)
                        echo '<img class="affiche-vignette" src="generationVignette125.php/?src=Images/'.$tuple->src.'">';
                    echo '</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td>';
                        // On affiche le titre du cd
                        echo '<span class="affiche-titre">'.$tuple->titre.'</span>';
                    echo '</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td>';
                        // On affiche l'auteur/artiste du cd
                        echo '<span class="affiche-auteur">'.$tuple->auteur.'</span>';
                    echo '</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td>';
                        // On affiche un bouton détail
                        echo '<span class="affiche-prix"><a class="bouton-details" href="cd.php?titre='.$tuple->titre.'" > Details </a></span>';
                        // On affiche un bouton d'ajout au panier
                        echo '<a class="bouton-ajouterpanier" href="ajoutPanier.php?titre=' .$tuple->titre. '">+</a>';
                    echo '</td>';
                echo '</tr>';
            echo '</td>';
            echo '</table>';
        }
        // On ferme le curseur des réultats de la requête
        $resultats->closeCursor();
    }
    catch(Exception $e){
        // Si une erreur liée à la base de données -> on affiche l'erreur
        echo 'Erreur : '.$e->getMessage().'<br />';
    }

    // On finalise le tableau
    echo '</table>';
    ?>

    <!-- On indique une aide pour la compréhension du système -->
    <div class="txt-aide">Pour ajouter au panier il vous suffit d'appuyer sur le bouton<a class="bouton-ajouterpanier">+</a> et pour voir les détails appuyer sur <a class="bouton-details"> Details </a> </div>
    <h3 class="contenue-titre">Rechercher un CD</h3>


    </body>
</html>
