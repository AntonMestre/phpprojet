<?php
    /**
     * Nom: connexion_back.php
     * Auteur: Mathieu Derrit & Antonin Maystre
     * Objectif: gérer la connexion au site
     * Version: 1.0
     */

    // On démarre la session
    session_start();

    // On récupère dans des variables les données envoyées par le formulaire
    $email=$_POST['email'];
    $mdp=$_POST['mdp'];
    
    // On vérifie que les variables ne sont pas vides
    if(isset($email) && isset($mdp)){

        // On intègre les variables pour la connexion de la base de données
        include 'bd_identifiant.php';

        // On effectue une tentative de connexion à la base de données
        try {
            // $connexion nous permet de se connecter à la base de données
            $connexion   =   new   PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_bdd,   $PARAM_user,$PARAM_pw);
            
            // On vérifie par la suite que l'utilisateur existe dans la base de données
            $resultats=$connexion->query("SELECT * FROM user WHERE email='$email' "); 
            $resultat= $resultats->fetch(PDO::FETCH_ASSOC);
           
            // On regarde si il y a un résultat à la requête
            if($resultat['email'] != null){
                
                // Nous verifions si le mot de passe est correcte
                if(password_verify($mdp,$resultat['mdp'])){

                    // Si c'est le bon mot de passe on détruit la session anonyme pour remplacer par une nouvelle
                        session_destroy();
                        session_start();
                        $_SESSION['email']=$email;
                        $_SESSION['nom']=$resultat['nom'];
                        $_SESSION['statut']=$resultat['statut'];

                        header('Location: index.php');
                }else{
                    // Si mauvais mot de passe alors on renvoie l'erreur
                    header('Location: connexion.php?err=wrongmdp');
                }

            }else{
                // Si email inconnu alors on renvoie l'erreur
                header('Location: connexion.php?err=inconnu');
            }

        }catch(Exception $e){
            // Si une erreur liée à la base de données -> on affiche l'erreur
            echo 'Erreur : '.$e->getMessage().'<br />';
        }
    } else {
        // Tous les champs ne sont pas remplie
        header('Location: connexion.php?err=incomplet');
    }

?>