<?php

    /**
     * Nom: inscription.php
     * Auteur: Mathieu Derrit & Antonin Maystre
     * Objectif: Afficher le formulaire d'inscription
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
    <h3 class="titre">Inscription</h3>
    <?php 


    // Si erreur alors on affiche
    if(isset($_GET["err"]) && $_GET["err"]=="email"){
        echo "<p class='errormsg'>Email déjà utiliser par un utilisateur </p>!";
    }
    if(isset($_GET["err"]) && $_GET["err"]=="incomplet"){
        echo "<p class='errormsg'>Le formulaire est incomplet ! </p>";
    }
    ?>

    <form action="inscription_back.php" method="POST">
        <label>email</label>
        <br/>
        <input type="email" name="email"/>
        <br/>
        <label>Nom</label>
        <br/>
        <input type="text" name="nom"/>
        <br/>
        <label>Mot de passe</label>
        <br/>
        <input type="password" name="mdp"/>
        <br/>
        <input type="submit" />
    </form>

    </div>

    </body>