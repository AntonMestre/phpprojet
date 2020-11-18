<?php

/**
 * Nom: generationVignette.php
 * Auteur: Mathieu Derrit & Antonin Maystre
 * Objectif: Générer la vignette d'un CD
 * Version: 1.0
 */

// The file
    
    $filename = htmlspecialchars($_GET["src"]);
    
    // Content type
    header('Content-Type: image/jpeg');
    
    // Get new dimensions
    list($width, $height) = getimagesize($filename);
    $new_width = 125;
    $new_height = 125;
    
    // Resample
    $image_p = imagecreatetruecolor($new_width, $new_height);
    $image = imagecreatefromjpeg($filename);
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    
    // Output
    imagejpeg($image_p, null, 100);


