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
 * Nom: cd.php
 * Auteur: Mathieu Derrit & Antonin Maystre
 * Objectif: Afficher les détails d'un cd
 * Version: 1.0
 */
$titre = htmlspecialchars($_GET["titre"]);
echo '<h3 class="contenue-titre">'.$titre.'<h3>';


$PARAM_hote='localhost'; 
$PARAM_bdd='projetphp';
$PARAM_user='root';
$PARAM_pw='';

    
try {
    $connexion   =   new   PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_bdd,   $PARAM_user,$PARAM_pw);

    
    $resultats=$connexion->query("SELECT * FROM cd WHERE titre='$titre' LIMIT 1"); 
    $resultat = $resultats->fetch(PDO::FETCH_ASSOC);

    
    echo '<table>';
        echo '<tr>';
            echo '<td></td>';
            echo '<td>'.$resultat['auteur'].'</td>';
        echo '</tr>';
        echo '<tr>';
            echo '<td colspan=2>Image</td>';
        echo '</tr>';
    echo '</table>';

    $resultats->closeCursor();

}catch(Exception $e){
    echo 'Erreur : '.$e->getMessage().'<br />';
}


?>


<table>

        <tr>
            <td>Image</td>
            <td>truc</td>
        </tr>
  
          <tr>
            <td colspan=2>Image</td>
        </tr>

</table>