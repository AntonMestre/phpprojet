<?php

session_start();

if(isset($_SESSION['panier'])){
    unset($_SESSION['panier']);
}

header('Location: panier.php');
?>