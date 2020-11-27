<?php

session_start();

$titre = htmlspecialchars($_GET["titre"]);

if(isset($titre)){

  if(isset($_SESSION['panier'])){
    $panier=$_SESSION['panier'];
    $longueurTableau=count($panier);
    // verifier si existe en base
    $panier[$longueurTableau++]=$titre;
    $_SESSION['panier']=$panier;
  }else{
    $panier[0]=$titre;
    $_SESSION['panier'] = $panier;
  }
}
echo 'Ajouté au panier';
echo '<a href="panier.php">mon panier</a>';
echo '<a href="index.php">acueil</a>';
?>
