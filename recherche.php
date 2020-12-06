<?php
    /**
     * Nom: recherche.php
     * Auteur: Mathieu Derrit & Antonin Maystre
     * Objectif: gérer une recherche de cd
     * Version: 1.0
     */

    // On démarre la session
    session_start();

    // On récupère dans des variables les données envoyées par le formulaire
    $titre=$_POST['titreCD'];
    
    // On vérifie que les variables ne sont pas vides
    if(isset($titre)){

        // On intègre les variables pour la connexion de la base de données
        include 'bd_identifiant.php';

        // On effectue une tentative de connexion à la base de données
        try {
            // $connexion nous permet de se connecter à la base de données
            $connexion   =   new   PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_bdd,   $PARAM_user,$PARAM_pw);
            
            // On vérifie par la suite que l'utilisateur existe dans la base de données
            $resultats=$connexion->query("SELECT * FROM cd WHERE titre='$titre' "); 
            $resultat= $resultats->fetch(PDO::FETCH_ASSOC);
           
            // On regarde si il y a un résultat à la requête
            if($resultat['titre'] != null){

                // Dans ce cas on renvoie en affichant le cd
                header('Location: cd.php?titre='.$titre);

            }else{
                // Si email inconnu alors on renvoie l'erreur
                header('Location: index.php?err=inconnu');
            }

        }catch(Exception $e){
            // Si une erreur liée à la base de données -> on affiche l'erreur
            echo 'Erreur : '.$e->getMessage().'<br />';
        }
    } else {
        // Tous les champs ne sont pas remplie
        header('Location: index.php?err=incomplet');
    }

?>