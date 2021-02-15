<?php

  $projet__nom =  addslashes($_POST['nom_du_projet']);
  $projet__date_de_creation =  addslashes($_POST['date_de_creation']);
  $diffuseur__societe =  addslashes($_POST['diffuseur__societe']);
  $projet__statut =  "Projet en cours";

  $sql = "SELECT * FROM Diffuseurs WHERE diffuseur__societe='".$diffuseur__societe."'";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error);

  $row = $result->fetch_assoc();
  if($row){
    $diffuseur__id = $row["diffuseur__id"];
  }

  $sql = "INSERT INTO Projets ( projet__nom, projet__date_de_creation, projet__statut, diffuseur__id)
  VALUES ('$projet__nom', '$projet__date_de_creation', '$projet__statut', '$diffuseur__id')";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error);

  $conn->close();

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


  header('Location: ../projet__single.php?projet__id='.$last_id);
?>
