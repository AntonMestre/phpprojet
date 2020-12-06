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
    // Si erreur alors on affiche
    if(isset($_GET["err"]) && $_GET["err"]=="introuvable"){
        echo "<p class='errormsg'>CD introuvable !</p>";
    }
    if(isset($_GET["err"]) && $_GET["err"]=="incomplet"){
        echo "<p class='errormsg'>Le formulaire est incomplet !</p>";
    }
 ?>
    <h3 class="titre">Ajouter un CD</h3>
        <form action="ajouterCD.php" method="POST" enctype="multipart/form-data">
            <label>Titre</label>
            <br/>
            <input type="text" name="titre"/>
            <br/>
            <label>Auteur</label>
            <br/>
            <input type="text" name="auteur"/>
            <br/>
            <label>Genre</label>
            <br/>
            <input type="text" name="genre"/>
            <br/>
            <label>Prix</label>
            <br/>
            <input type="text" name="prix"/>
            <br/>
            <label>Pochette (.jpg)</label>
            <br/>
            <input type="file" name="src"/>
            <br/>
            <input type="submit" />
        </form>
        <br/>
        <br/>
        <br/>
        <h3 class="titre">Supprimer un CD</h3>
        <form action="SupprimerCD.php" method="POST">
            <label>Titre</label>
            <br/>
            <input type="text" name="titre"/>
            <br/>
            <label>Auteur</label>
            <br/>
            <input type="text" name="auteur"/>
            <br/>
            <input type="submit" />
        </form>
    </div>

    </body>