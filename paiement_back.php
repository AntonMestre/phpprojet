<?php
    /**
     * Nom: paiement_back.php
     * Auteur: Mathieu Derrit & Antonin Maystre
     * Objectif: gérer le paiement
     * Version: 1.0
     */

    // On démarre la session
    session_start();

    // On récupère dans des variables les données envoyées par le formulaire
    $num=$_POST['num'];
    $date = date('d-m-Y', strtotime($_POST['date']));
    
    // On vérifie que les variables ne sont pas vides
    if(isset($num) && isset($date)){

        // On verifie qu'il y a bien 16 caractere pour le code
        if(strlen($num) == 16){
            
            // On verifie si le premier caractère est egal au dernier
            if($num[0] == $num[15]){

                // Je recupère la date d'aurjoud'hui et j'ajoute 3 mois

                $datemax = new DateTime("NOW"); ;
                $datemax->add(new DateInterval('P3M'));

                // Si la date est supérieure
                if($date > $datemax->format('d-m-Y')){
                    
                    // On supprime le panier
                    unset($_SESSION['panier']);

                    // Si le paiement c'est bien réaliser on retourne sur la page d'index
                    header('Location: index.php');

                }else{
                    // Sinon c'est que la carte n'est plus valable
                    header('Location: paiement.php?err=date');
                }

            }else{
                // Sinon c'est que le code est invalide
                header('Location: paiement.php?err=carte');
            }

        }else {
            // Sinon c'est que le code est invalide
            header('Location: paiement.php?err=carte');
        }

       
    } else {
        // Tous les champs ne sont pas remplie
        header('Location: paiement.php?err=incomplet');
    }

?>