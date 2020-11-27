<?php

    /**
     * Nom: suppressionPanier.php
     * Auteur: Mathieu Derrit & Antonin Maystre
     * Objectif: Supprimer l'ensemble du panier
     * Version: 1.0
     */

    // On démarre la session    
    session_start();

    // On supprime que si un panier est existant
    if(isset($_SESSION['panier'])){
        // Suppression du panier
        unset($_SESSION['panier']);
    }

    // Retour sur la page du panier
    header('Location: panier.php');
?>