<?php
    /**
     * Nom: deconnexion.php
     * Auteur: Mathieu Derrit & Antonin Maystre
     * Objectif: Deconnecter l'utilisateur
     * Version: 1.0
     */

    // On démarre la session
    session_start();

    // On detruit la session
    session_destroy();

    // On redirige
    header('Location: index.php');
?>