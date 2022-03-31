<?php

// Ce fichier permet de supprimer des élèments
// de la base de donnée.


/**
* Récuparation des valeurs
*/

  $base = $_GET['base'];
  $cible = $_GET['cible'];
  $id =  $_GET['id'];


/**
* Mise à jour de la base de données
*/

  $sql = "DELETE FROM $base WHERE $cible = $id";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error); $conn->close();

  $conn->close();


  /**
  * Redirection vers la page profil
  */

  if($_GET['location']){
    $location = $_GET['location'] ;
  }else {
    $location = 'index';
  };

  header('Location: ../'.$location.'.php');
?>
