<?php

    /**
     * Nom: supprimerCD.php
     * Auteur: Mathieu Derrit & Antonin Maystre
     * Objectif: Supression d'un CD de la BD
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

    // On récupère dans des variables les données envoyées par le formulaire
    $Titre=$_POST['titre'];
    $Auteur=$_POST['auteur'];
    
    // On vérifie que les variables ne sont pas vides
    if(isset($Titre) && isset($Auteur)){
        
               // On intègre les variables pour la connexion de la base de données
               include 'bd_identifiant.php';

               // On effectue une tentative de connexion à la base de données
               try {
                   // $connexion nous permet de se connecter à la base de données
                   $connexion   =   new   PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_bdd,   $PARAM_user,$PARAM_pw);
                    
                    // On vérifie que le CD existe en base de données
                    $resultats=$connexion->query("SELECT * FROM cd WHERE titre='$Titre' AND auteur='$Auteur'"); 
                    $resultat= $resultats->fetch(PDO::FETCH_ASSOC);
                
                    // On regarde si il y a un résultat à la requête
                    if($resultat['titre'] != null){

                        // On supprime l'image du dossier
                        unlink('Images/'.$resultat['src']);

                        // On supprime de la BD
                        $sql = "DELETE FROM `cd` WHERE titre = ? AND auteur = ?";        
                        $requete = $connexion->prepare($sql);
                        $response = $requete->execute(array($Titre,$Auteur));

                        header('Location: management.php?etatcd=supprimer');
                        
                    }else{
                        // CD introuvable
                        header('Location: management.php?err=introuvable');
                    }
               
                }catch(Exception $e){
                    // Si une erreur liée à la base de données -> on affiche l'erreur
                    echo 'Erreur : '.$e->getMessage().'<br />';
                }    
    }else {
        // Tous les champs ne sont pas remplie
        header('Location: management.php?err=incomplet');
    }  

?>