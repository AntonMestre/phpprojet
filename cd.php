<?php

    /**
     * Nom: cd.php
     * Auteur: Mathieu Derrit & Antonin Maystre
     * Objectif: Afficher les détails d'un cd
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
    <div class="main">
    <?php
        // On récupère le titre du cd dans l'url
        $titre = htmlspecialchars($_GET["titre"]);
        
        // On intègre les variables pour la connexion de la base de données
        include 'bd_identifiant.php';

        // On effectue une tentative de connexion à la base de données
        try {

            // $connexion nous permet de se connecter à la base de données
            $connexion   =   new   PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_bdd,   $PARAM_user,$PARAM_pw);
            
            // On récupère l'ensemble des informations du cd par rapport à son titre
            $resultats=$connexion->query("SELECT * FROM cd WHERE titre='$titre' LIMIT 1"); 
            $resultat = $resultats->fetch(PDO::FETCH_ASSOC);

            // Si le titre existe (en base de données) alors on affiche les détails
            if($resultat['titre'] != null){

                // On créer un tableau pour l'affichage
                echo '<table class="table-padding">';
                echo '<tr style="vertical-align: bottom;padding-left:50px">';

                    // On génère et affiche les images à partir de générationVignette300.php (format: 300x300)
                    echo '<td><img class="affiche-vignette" src="generationVignette300.php/?src=Images/'.$resultat['src'].'"></td>';

                    // On affiche le titre, l'auteur, et le prix
                    echo '<td style="padding-left:50px;">
                        <span class="cd-album">Album CD - '.$resultat['genre'].'</span>
                        <br/><span class="cd-titre">'.$resultat['titre'].'</span>
                        <br/><span class="cd-auteur">'.$resultat['auteur'].'</span>
                        <br/><span class="cd-prix">'.$resultat['prix'].' €</span><a class="cd-ajouterpanier" style="text-decoration:none" href="ajoutPanier.php?titre=' .$resultat['titre']. '">Ajouter au panier</a></td>';
                    
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td colspan=2></td>';
                echo '</tr>';
             echo '</table>';
            }

            // On ferme le curseur des réultats de la requête
            $resultats->closeCursor();

        }catch(Exception $e){
            // Si une erreur liée à la base de données -> on affiche l'erreur
            echo 'Erreur : '.$e->getMessage().'<br />';
        }
    ?>

    </div>
    </body>