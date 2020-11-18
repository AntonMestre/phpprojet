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

echo 'CD disponibles à la vente :<br/>';

$taille=$elements->length;

for($i=0;$i<$taille;$i++){
    $enfants=$elements->item($i)->childNodes;
    foreach($enfants as $enfant){
        if($enfant->nodeName == "titre"){
            echo $enfant->nodeValue." | ";
        }else if( $enfant->nodeName == "auteur"){
            echo $enfant->nodeValue." | ";
        }else if($enfant->nodeName == "prix" ){
            echo $enfant->nodeValue." | ";
        }else if($enfant->nodeName == "srcvignette" ){
            echo '<img src="generationVignette.php/?src='.$enfant->nodeValue.'.jpg">';
        }
    }
}

/*
foreach($enfants as $enfant)
{
    if($enfant->nodeName == "titre"){
        echo $enfant->nodeValue." | ";
    }else if( $enfant->nodeName == "auteur"){
        echo $enfant->nodeValue." | ";
    }else if($enfant->nodeName == "prix" ){
        echo $enfant->nodeValue." | ";
    }else if($enfant->nodeName == "srcvignette" ){
        echo '<img src="generationVignette.php/?src='.$enfant->nodeValue.'.jpg">';
    }
}

*/
//$elements = $elements->item(5);
?>