<?php

    /**
     * Nom: generationVignette125.php
     * Auteur: Mathieu Derrit & Antonin Maystre
     * Objectif: Générer la vignette d'un CD (format: 125x125)
     * Version: 1.0
     */

    // On récupère le nom du fichier dans l'url
    $nomfichier = htmlspecialchars($_GET["src"]);
    
    // On indique le Content type de la page (jpeg)
    header('Content-Type: image/jpeg');
    
    // On récupère la hauteur et largeur de l'image dans les variables $width et $height
    list($largeur, $hauteur) = getimagesize($nomfichier);

    // On définit la nouvelle largeur et hauteur
    $nouvelle_largeur= 125;
    $nouvelle_hauteur= 125;
    
    // On créer une nouvelle image à partir de l'image déjà existante
    $image_p = imagecreatetruecolor($nouvelle_largeur, $nouvelle_hauteur);
    $image = imagecreatefromjpeg($nomfichier);
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $nouvelle_largeur, $nouvelle_hauteur, $largeur, $hauteur);
    
    // On renvoie la nouvelle image au nouveau format
    imagejpeg($image_p, null, 100);

?>