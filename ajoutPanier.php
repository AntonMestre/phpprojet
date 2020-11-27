<?php

    /**
     * Nom: ajoutPanier.php
     * Auteur: Mathieu Derrit & Antonin Maystre
     * Objectif: Ajouter un cd au panier de la session
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
    <div class="main">
<?php 
    // On récupère le titre du cd par l'url
    $titre = htmlspecialchars($_GET["titre"]);

    // On vérifie qu'un titre a bien été rentrer dans l'url
    if(isset($titre)){

        // On vérifie si le panier est existant ou pas
        if(isset($_SESSION['panier'])){

            // Si oui alors on récupère le tableau du panier dans la variable de session et on compte la longueur
            $panier=$_SESSION['panier'];
            $longueurTableau=count($panier);

            // On vérifie maintenant si le cd existe en base de données (qu'il n'y ai pas modification de l'url)
            include "bd_identifiant.php";
            
            // On effectue une tentative de connexion à la base de données
            try {
                // $connexion nous permet de se connecter à la base de données
                $connexion   =   new   PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_bdd,   $PARAM_user,$PARAM_pw);

                // On récupère l'ensemble des informations du cd par rapport à son titre
                $resultats=$connexion->query("SELECT titre FROM cd WHERE titre='$titre' LIMIT 1"); 
                $resultat = $resultats->fetch(PDO::FETCH_ASSOC);

                // Si le titre existe (en base de données) alors on insère dans le tableau du panier le cd
                if($resultat['titre'] != null){
                  
                  // on insère à la fin du tableau du panier le cd 
                  $panier[$longueurTableau++]=$titre;
                  $_SESSION['panier']=$panier;
                }else {
                  // Si pas de résultat alors on indique que le CD est introuvable
                  echo "CD introuvable";
                }
                // On ferme le curseur des réultats de la requête
                $resultats->closeCursor();

                }catch(Exception $e){
                // Si une erreur liée à la base de données -> on affiche l'erreur
                echo 'Erreur : '.$e->getMessage().'<br />';
                }
        }else{
          // Sinon on créer le tableau pour le panier et on insère le titre
            $panier[0]=$titre;
            $_SESSION['panier'] = $panier;
        }
    }

    echo '<span class="affiche-titre" > Ajouté au panier </span>';
    echo '</div>'
?>
