<!DOCTYPE html>
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
    echo '<table class="affiche">';
    
    try {
        $connexion   =   new   PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_bdd,   $PARAM_user,$PARAM_pw);

        $resultats=$connexion->query("SELECT * FROM cd LIMIT 5"); 
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        while($tuple= $resultats->fetch()) {
            echo '<td class="td-padding">';
            echo '<table>';
                echo '<tr>';
                    echo '<td>';
                        echo '<img class="affiche-vignette" src="generationVignette.php/?src=Images/'.$tuple->src.'">';
                    echo '</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td>';
                        echo '<span class="affiche-titre">'.$tuple->titre.'</span>';
                    echo '</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td>';
                        echo '<span class="affiche-auteur">'.$tuple->auteur.'</span>';
                    echo '</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td>';
                        echo '<span class="affiche-prix">'.$tuple->prix.' €</span>';
                    echo '</td>';
                echo '</tr>';
            echo '</td>';
            echo '</table>';
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


