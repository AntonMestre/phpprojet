<?php

    /**
     * Nom: paiement.php
     * Auteur: Mathieu Derrit & Antonin Maystre
     * Objectif: Afficher le formulaire de paiement
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
    <h3 class="titre">Paiement</h3>
    <?php 

    // Si erreur alors on affiche
    if(isset($_GET["err"]) && $_GET["err"]=="carte"){
        echo "<p class='errormsg'>Numero de carte invalide !</p>";
    }
    if(isset($_GET["err"]) && $_GET["err"]=="date"){
        echo "<p class='errormsg'>Date non valide !</p>";
    }
    if(isset($_GET["err"]) && $_GET["err"]=="incomplet"){
        echo "<p class='errormsg'>Le formulaire est incomplet !</p>";
    }


    echo '<form action="paiement_back.php" method="POST">
    <label>numeros:</label>
    <input type="number" name="num"/>
    <label>date d\'expiration:</label>
    <input type="date" name="date" />
    <input type="submit" />
    </form>';

    ?>

    </div>

    </body>