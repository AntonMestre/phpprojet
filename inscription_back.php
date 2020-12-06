<?php
    /**
     * Nom: inscription_back.php
     * Auteur: Mathieu Derrit & Antonin Maystre
     * Objectif: gérer l'inscription au site
     * Version: 1.0
     */

    // On démarre la session
    session_start();

    // On récupère dans des variables les données envoyées par le formulaire
    $email=$_POST['email'];
    $nom=$_POST['nom'];
    $mdp=$_POST['mdp'];
    
    // On vérifie que les variables ne sont pas vides
    if(isset($email) && isset($nom) && isset($mdp)){

        // On intègre les variables pour la connexion de la base de données
        include 'bd_identifiant.php';

        // On effectue une tentative de connexion à la base de données
        try {
            // $connexion nous permet de se connecter à la base de données
            $connexion   =   new   PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_bdd,   $PARAM_user,$PARAM_pw);
            
            // On vérifie par la suite que l'utilisateur n'existe pas déjà dans la base de données
            $resultats=$connexion->query("SELECT * FROM user WHERE email='$email' "); 
            $resultat= $resultats->fetch(PDO::FETCH_ASSOC);
           
            // On regarde si il y a un résultat à la requête
            if($resultat['email'] == null){
                
                // Avant de d'insérer en base de données nous allons encrypter le mot de passe
                $lemdp = password_hash($mdp,PASSWORD_DEFAULT);

                // Si pas de résultat alors on va inserer les données
                $insertion = "INSERT INTO user VALUES (?,?,?,?)";
                $requete= $connexion->prepare($insertion);
                $requete->execute([$email, $lemdp, $nom,"lambda"]);

                // On détruit la session anonyme pour remplacer par une nouvelle
                session_destroy();
                session_start();
                $_SESSION['email']=$email;
                $_SESSION['nom']=$nom;
                $_SESSION['statut']="lambda";

                header('Location: index.php');

            }else{
                // Si un utilisateur possède déjà l'email on l'indique
                header('Location: inscription.php?err=email');
            }

        }catch(Exception $e){
            // Si une erreur liée à la base de données -> on affiche l'erreur
            echo 'Erreur : '.$e->getMessage().'<br />';
        }
    
    }else {
        // Tous les champs ne sont pas remplie
        header('Location: inscription.php?err=incomplet');
    }  

?>