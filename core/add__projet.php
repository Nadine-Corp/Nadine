<?php

  /**
  * Récuparation des variables
  */

  $projet__statut =  "Projet en cours";
  $projet__nom =  addslashes($_POST['nom_du_projet']);
  $projet__date_de_creation =  addslashes($_POST['date_de_creation']);

  // Convertion des array js en array PHP

  $artiste__societe = json_decode($_POST['artiste__societe']);
  $diffuseur__societe =  json_decode($_POST['diffuseur__societe']);
  $diffuseur__societe =  addslashes($diffuseur__societe[0]);



  /**
  * Traitement Checkbox Précompte
  */

  if( isset($_POST['precompte'])){
    $projet__precompte = '1';
  } else {
    $projet__precompte = '0';
  };
  echo $projet__precompte;



  /**
  * Traitement Checkbox Rétrocession
  */

  if( isset($_POST['retrocession'])){
    $projet__retrocession = '1';
  } else {
    $projet__retrocession = '0';
  };
  echo $projet__retrocession;



  /**
  * Traitement Checkbox Porteur du projet
  */

  if( isset($_POST['porteurduprojet'])){
    $projet__porteurduprojet = '1';
  } else {
    $projet__porteurduprojet = '0';
  };
  echo $projet__porteurduprojet;



  /**
  * Convertion des diffuseur__societe en diffuseur__id
  */

  $sql = "SELECT * FROM Diffuseurs WHERE diffuseur__societe='".$diffuseur__societe."'";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error);

  $row = $result->fetch_assoc();
  if($row){
    $diffuseur__id = $row["diffuseur__id"];
  }



  /**
  * Convertion des artiste__societe en ariste__id
  */

  $artiste__id = array();

  foreach ($artiste__societe as &$artiste) {
    $sql = "SELECT * FROM Artistes WHERE artiste__societe ='".$artiste."'";
    include 'query.php'; $result = $conn->query($sql) or die($conn->error);

    $row = $result->fetch_assoc();
    if($row){
      array_push($artiste__id, $row["artiste__id"]);
    }
  }
  $artiste__id = serialize($artiste__id);



  /**
  * Insertion dans la base donnée
  */

  $sql = "INSERT INTO Projets ( projet__nom, retrocession, retrocession, porteurduprojet, projet__date_de_creation, projet__statut, diffuseur__id, artiste__id)
  VALUES ('$projet__nom', '$retrocession', '$retrocession', '$porteurduprojet', '$projet__date_de_creation', '$projet__statut', '$diffuseur__id', '$artiste__id')";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error);

  $conn->close();



  /**
  * Redirection vers la page projet-single
  */

  $sql = "SELECT * FROM Projets ORDER BY projet__id DESC LIMIT 1;";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error);

  if (!$result) {
      die('Could not query:' . mysql_error());
  }
  $row = $result->fetch_assoc();
  if($row){
    $last_id = $row['projet__id'];
  }

  $conn->close();

  header('Location: ../projet__single.php?projet__id='.$last_id.'');
?>
