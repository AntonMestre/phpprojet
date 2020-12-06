<?php

    /**
     * Nom: ajouterCD.php
     * Auteur: Mathieu Derrit & Antonin Maystre
     * Objectif: Ajouter d'un CD en BD
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
    $Genre=$_POST['genre'];
    $Prix=$_POST['prix'];
    
    // On vérifie que les variables ne sont pas vides
    if(isset($Titre) && isset($Auteur) && isset($Genre) && isset($Prix)){
        $url=$_FILES['src']['name'];
        // On met l'image de la pochette dans le dossier
        move_uploaded_file($_FILES['src']['tmp_name'],"images/".$url);

               // On intègre les variables pour la connexion de la base de données
               include 'bd_identifiant.php';

               // On effectue une tentative de connexion à la base de données
               try {
                   // $connexion nous permet de se connecter à la base de données
                   $connexion   =   new   PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_bdd,   $PARAM_user,$PARAM_pw);
                    
                   // On insère le CD
                    $insertion = "INSERT INTO cd VALUES (?,?,?,?,?,?)";
                    $requete= $connexion->prepare($insertion);
                    $requete->execute([NULL,$Titre, $Auteur, $Genre,$Prix,$url]);
               
                    // Insertion réalisé
                    header('Location: management.php');

                }catch(Exception $e){
                    // Si une erreur liée à la base de données -> on affiche l'erreur
                    echo 'Erreur : '.$e->getMessage().'<br />';
                }    
    }else {
        // Tous les champs ne sont pas remplie
        header('Location: management.php?err=incomplet');
    }  

?>