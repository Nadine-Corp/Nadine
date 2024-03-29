<?php

// Ce fichier permet de modifier un projet existant


  /**
  * Récuparation des variables
  */

  $projet__id =  addslashes($_POST['projet__id']);
  $projet__nom =  addslashes($_POST['nom_du_projet']);
  $projet__date_de_creation =  addslashes($_POST['date_de_creation']);
  $projet__statut =  addslashes($_POST['projet__statut']);

  // Convertion des array js en array PHP

  $artiste__societe = json_decode($_POST['artiste__societe']);
  $diffuseur__societe = htmlspecialchars_decode($_POST['diffuseur__societe']);
  $diffuseur__societe =  json_decode($diffuseur__societe);
  $diffuseur__societe =  addslashes($diffuseur__societe[0]);



  /**
  * Traitement Checkbox Précompte
  */

  if( isset($_POST['precompte'])){
    $projet__precompte = '1';
  } else {
    $projet__precompte = '0';
  };



  /**
  * Traitement Checkbox Rétrocession
  */

  if( isset($_POST['retrocession'])){
    $projet__retrocession = '1';
  } else {
    $projet__retrocession = '0';
  };



  /**
  * Traitement Checkbox Porteur du projet
  */

  if( isset($_POST['porteurduprojet'])){
    $porteurduprojet = '1';
  } else {
    $projet__porteurduprojet = '0';
  };



  /**
  * Convertion des diffuseur__societe en diffuseur__id
  */

  $sql = "SELECT * FROM Diffuseurs WHERE diffuseur__societe ='".$diffuseur__societe."'";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error);

  $row = $result->fetch_assoc();
  if($row){
    $diffuseur__id = $row["diffuseur__id"];
  }



  /**
  * Mise à jour de la base de données
  */

  $sql = "UPDATE Projets
  SET projet__nom = '$projet__nom', projet__precompte = '$projet__precompte', projet__retrocession = '$projet__retrocession', projet__porteurduprojet = '$projet__porteurduprojet', projet__date_de_creation = '$projet__date_de_creation', projet__statut = '$projet__statut', diffuseur__id = '$diffuseur__id'
  WHERE projet__id = $projet__id";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error); $conn->close();

  // Update Date fin

  if(!empty( $_POST['date_de_fin'] )) {
    $projet__date_de_fin =  addslashes($_POST['date_de_fin']);
    $sql = "UPDATE Projets
    SET projet__date_de_fin = '$projet__date_de_fin'
    WHERE projet__id = $projet__id";
    include 'query.php'; $result = $conn->query($sql) or die($conn->error); $conn->close();
  }
  $conn->close();



  /**
  * Redirection vers la page projet ou projet-single
  */

  if($projet__statut == 'Projet terminé') {
    header('Location: ../projets.php');
  }else{
    header('Location: ../projet__single.php?projet__id='.$projet__id.'');
  };
?>
