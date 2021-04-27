<?php

// Ce fichier permet de changer la couleur de Nadine lorsque l'on clique sur
// le bouton dans le header. Plus exactement, ce fichier est utiliser par
// assets/js/nadine.js en Ajax.


/**
* Récuparation de la couleur actuellement stockée dans la base
*/

$sql = "SELECT * FROM Options WHERE Options.option__nom = 'option__couleur'";
include 'query.php'; $result = $conn->query($sql) or die($conn->error);
if ($result->num_rows > 0):
  while($row = $result->fetch_assoc()):
    $couleurActuelle = $row["option__valeur"];
  endwhile;
endif;


/**
* Faire Cycler les couleurs
*/

  if($couleurActuelle == "rouge-trash"){
    $couleurfutur = "bleu-google";
  };
  if($couleurActuelle == "bleu-google"){
    $couleurfutur = "violet-cool";
  };
  if($couleurActuelle == "violet-cool"){
    $couleurfutur = "rose-neutre";
  };
  if($couleurActuelle == "rose-neutre"){
    $couleurfutur = "orange-fluo";
  };
  if($couleurActuelle == "orange-fluo"){
    $couleurfutur = "gris-dark";
  };
  if($couleurActuelle == "gris-dark"){
    $couleurfutur = "rouge-trash";
  };


  /**
  * Mettre à jour la base de données avec la nouvelle couleur
  */

  $sql = "UPDATE Options
  SET option__valeur = '$couleurfutur'
  WHERE option__nom = 'option__couleur'";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error); $conn->close();


  /**
  * Renvoyer le résultat à nadine.js
  */

  echo $couleurfutur;


?>
