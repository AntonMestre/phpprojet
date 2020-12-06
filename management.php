<?php

    /**
     * Nom: management.php
     * Auteur: Mathieu Derrit & Antonin Maystre
     * Objectif: Permettre l'ajout d'un cd ou ça supression
     * Version: 1.0
     */

    // On démarre la session
    session_start();

    // On vérifie si le membre est connecté
    if(isset($_SESSION['email'])){
        // On vérifie qu'il soit administrateur
        if($_SESSION['statut'] != "admin"){
            // Si il ne l'est pas alors nous renvoyons sur la page index
            header('Location: index.php');
        }
    }else{
        // Sinon on redirige sur la page de connexion
        header('Location: connexion.php');
    }

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
        <h2> Ajouter un CD </h2>
        <form action="ajouterCD.php" method="POST" enctype="multipart/form-data">
            <label>Titre:</label>
            <input type="text" name="titre"/>
            <label>Auteur:</label>
            <input type="text" name="auteur"/>
            <label>Genre:</label>
            <input type="text" name="genre"/>
            <label>Prix:</label>
            <input type="text" name="prix"/>
            <label>Pochette (.jpg):</label>
            <input type="file" name="src"/>
            <input type="submit" />
        </form>

        <h2> Supprimer un CD </h2>
        <form action="SupprimerCD.php" method="POST">
            <label>Titre:</label>
            <input type="text" name="titre"/>
            <label>Auteur:</label>
            <input type="text" name="auteur"/>
            <input type="submit" />
        </form>
    </div>

    </body>