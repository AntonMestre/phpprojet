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
        <span class="bandeau-menu"><a class="bandeau-menu-a" href="index.php">Accueil</a> | <a class="bandeau-menu-a" href="panier.php">Panier</a></span>
    </div>


<div class="main">
<?php

/**
 * Nom: cd.php
 * Auteur: Mathieu Derrit & Antonin Maystre
 * Objectif: Afficher les détails d'un cd
 * Version: 1.0
 */
$titre = htmlspecialchars($_GET["titre"]);


$PARAM_hote='localhost'; 
$PARAM_bdd='projetphp';
$PARAM_user='root';
$PARAM_pw='';

    
try {

    $connexion   =   new   PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_bdd,   $PARAM_user,$PARAM_pw);
    
    $resultats=$connexion->query("SELECT * FROM cd WHERE titre='$titre' LIMIT 1"); 
    $resultat = $resultats->fetch(PDO::FETCH_ASSOC);

    echo '<table class="table-padding">';
        echo '<tr style="vertical-align: bottom;padding-left:50px">';
            echo '<td><img class="affiche-vignette" src="generationVignette500.php/?src=Images/'.$resultat['src'].'"></td>';
            echo '<td style="padding-left:50px;">
            <span class="cd-album">Album CD </span>
            <br/><span class="cd-titre">'.$resultat['titre'].'</span>
            <br/><span class="cd-auteur">'.$resultat['auteur'].'</span>
            <br/><span class="cd-prix">'.$resultat['prix'].' €</span><a class="cd-ajouterpanier" style="text-decoration:none" href="ajoutPanier.php?titre=' .$resultat['titre']. '">Ajouter au panier</a></td>';
        echo '</tr>';
        echo '<tr>';
            echo '<td colspan=2></td>';
        echo '</tr>';
    echo '</table>';

    $resultats->closeCursor();

}catch(Exception $e){
    echo 'Erreur : '.$e->getMessage().'<br />';
}


?>
</div>
    </body>