<?php

    /**
     * Nom: connexion.php
     * Auteur: Mathieu Derrit & Antonin Maystre
     * Objectif: Afficher le formulaire de connexion
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

    // Si erreur alors on affiche
    if(isset($_GET["err"]) && $_GET["err"]=="inconnu"){
        echo "Email inconnu !";
    }
    if(isset($_GET["err"]) && $_GET["err"]=="wrongmdp"){
        echo "Mot de passe erroné !";
    }
    if(isset($_GET["err"]) && $_GET["err"]=="incomplet"){
        echo "Le formulaire est incomplet !";
    }

    // Si l'utilisateur est déjà connecter (définit par la variable email) et donc qu'il n'a pas une session anonyme on lui indique qu'il est déjà connecté
    if(isset($_SESSION["email"])){
        echo "Vous êtes déjà connecté !";
    }else {
        // Sinon on affiche le formulaire de connexion
        echo '<form action="connexion_back.php" method="POST">
        <label>email:</label>
        <input type="email" name="email"/>
        <label>Mot de passe:</label>
        <input type="password" name="mdp" />
        <input type="submit" />
        </form>';
    }
    ?>

    </div>

    </body>