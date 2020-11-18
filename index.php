<!DOCTYPE html>
<html>
    <head>
        <title>SpaceY | Vente de CD</title>
        <link rel="stylesheet" href="css/main.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet"> 
    </head>

    <body>

    <div class="bandeau-front">
        <h1 class="bandeau-front-titre">SPACE<span style="color:coral;">Y<span></h1>
        <span class="bandeau-front-description">La musique pour les voyageurs</span>
    </div>

    <?php
    /**
     * Nom: index.php
     * Auteur: Mathieu Derrit & Antonin Maystre
     * Objectif: Afficher les CD disponibles à la vente
     * Version: 1.0
     */
    $PARAM_hote='localhost'; 
    $PARAM_bdd='projetphp';
    $PARAM_user='root';
    $PARAM_pw='';

    echo '<h3 class="contenue-titre">Les CD à  l\'affiche cette semaine</h1>';
    echo '<table>';
    
    try {
        $connexion   =   new   PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_bdd,   $PARAM_user,$PARAM_pw);

        $resultats=$connexion->query("SELECT * FROM cd"); 
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        while( $tuple= $resultats->fetch() ) {
            echo $tuple->src.'<br />';
            echo $tuple->auteur.'<br />';
        }
        $resultats->closeCursor();
    }
    catch(Exception $e){
        echo 'Erreur : '.$e->getMessage().'<br />';
    }
    echo '</table>';
    echo '</td>';

    ?>


    </body>

</html> 


