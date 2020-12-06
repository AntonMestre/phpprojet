<?php
    /**
     * Nom: panier.php
     * Auteur: Mathieu Derrit & Antonin Maystre
     * Objectif: Afficher le panier actuel
     * Version: 1.0
     */

    // On démarre la session
    session_start();

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
    
    
    <?php
    // On affiche le titre de la page
    echo '<h3 class="contenue-titre">Votre panier</h3>';
    echo '<div class="main">';


    //  On vérifie si il un panier a été déclarer
    if(isset($_SESSION['panier'])){
        
        // On récupère le panier
        $panier = $_SESSION['panier'];

        // On vérifie si le panier est vide
        $longueurTableau=count($panier);
        if($longueurTableau<1){
            
            // Si il est vide on affiche qu'il l'est
            echo "<span style='font-family: titre;'>Panier vide</span>";
        }else{
            // On affiche deux boutons pour supprimer le panier et un autre pour payer le panier
            echo '<div class="boutons-panier" ><a class="bouton-suppressionpannier" href="suppressionPanier.php">Supprimer le pannier</a><a class="bouton-payerpannier" href="paiement.php">Payer le pannier</a></div>';
            
            // On créer le tableau pour afficher
            echo '<table class="panier">';
            echo '<tr>';
            echo '<th>CD</th>';
            echo '<th> Prix </td>';
            echo '</tr>';

            // On créer un total
            $total=0;

            // On intègre les variables pour la connexion de la base de données
            include 'bd_identifiant.php';

            // On effectue une tentative de connexion à la base de données
            try {

                // Sinon on affiche le contenue du panier
                for($i=0;$i<count($panier);$i++){

                        // On créer le lien avec la base de données
                        $connexion   =   new   PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_bdd,   $PARAM_user,$PARAM_pw);
        
                        // On récupère l'auteur et le prix par rapport à son titre
                        $resultats=$connexion->query("SELECT auteur,prix FROM cd WHERE titre='$panier[$i]' LIMIT 1"); 
                        $resultat = $resultats->fetch(PDO::FETCH_ASSOC);

                        // On ajoute pour chaque cd le prix au total
                        $total=$total+$resultat['prix'];

                        echo '<tr>';
                            echo '<td>';
                                // On affiche le titre et l'auteur
                                echo $panier[$i].'<span class="panier-auteur"> par '.$resultat['auteur'].'</span>';
                            echo '</td>';
                            echo '<td class="tdright-panier">';
                                // On affiche le prix
                                echo $resultat['prix'].' €';      
                            echo '</td>';
                        echo '</tr>';
                        
                        // On ferme le curseur du résultat de la requête
                        $resultats->closeCursor();
                }
            }catch(Exception $e){
                    // Si une erreur liée à la base de données -> on affiche l'erreur
                    echo 'Erreur : '.$e->getMessage().'<br />';
            }

            echo '<tr>';
            echo '<th>Total</th>';
            // On affiche le total du panier
            echo '<th> '.$total.' €</td>';
            echo '</tr>';

            // On finis le tableau
            echo '</table>';
        }
    }else {

        // Si il n'est pas déclaré alors on affiche qu'il est vide
        echo "<span style='font-family: titre;'>Panier vide</span>";
    }

    ?>

    <div>
    </body>
</html>