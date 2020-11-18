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

    // On load le fichier XML
    $doc = new DOMDocument();
    $doc->load('data.xml');



    // On récupère les éléments pays dans le fichier XML
    $elements = $doc->getElementsByTagName('cd');

    echo '<h3 class="contenue-titre">Les CD à  l\'affiche cette semaine</h1>';
    echo '<table>';
    $taille=$elements->length;

    for($i=0;$i<5;$i++){
        $enfants=$elements->item($i)->childNodes;
        echo '<td>';
        echo '<table>';
        foreach($enfants as $enfant){
            if($enfant->nodeName == "srcvignette" ){
                echo '<tr>';
                echo '<td>';
                echo '<img src="generationVignette.php/?src=Images/'.$enfant->nodeValue.'.jpg">';
                echo '</td>';
                echo '</tr>';

                $tab[0]=$enfant->nodeValue;
                echo $tab[0];
            }else if($enfant->nodeName == "titre"){
                echo '<tr>';
                echo '<td>';
                echo $enfant->nodeValue;
                echo '</td>';
                echo '</tr>';

                $tab[1]=$enfant->nodeValue;
            }else if( $enfant->nodeName == "auteur"){
                echo '<tr>';
                echo '<td>';
                echo $enfant->nodeValue;
                echo '</td>';
                echo '</tr>';
                $tab[2]=$enfant->nodeValue;
            }else if($enfant->nodeName == "prix" ){
                echo '<tr>';
                echo '<td>';
                echo $enfant->nodeValue;
                echo '</td>';
                echo '</tr>';
                $tab[3]=$enfant->nodeValue;
            }

            echo $tab[0];
            
        }
        echo '</table>';
        echo '</td>';
    }

    ?>


    </body>

</html> 


