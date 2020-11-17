<?php

/**
 * Nom: index.php
 * Auteur: Mathieu Derrit & Antonin Maystre
 * Objectif: Afficher les CD disponibles à la vente
 * Version: 1.0
 */

include 'generationVignette.php';
// On load le fichier XML
$doc = new DOMDocument();
$doc->load('data.xml');

// On récupère les éléments pays dans le fichier XML
$elements = $doc->getElementsByTagName('cd');

echo 'CD disponibles à la vente :<br/>';

$elements = $elements->item(0);
$enfants = $elements->childNodes;

foreach($enfants as $enfant)
{
    if($enfant->nodeName == "titre"){
        echo $enfant->nodeValue." | ";
    }else if( $enfant->nodeName == "auteur"){
        echo $enfant->nodeValue." | ";
    }else if($enfant->nodeName == "prix" ){
        echo $enfant->nodeValue." | ";
    }else if($enfant->nodeName == "srcvignette" ){

    }
}


?>