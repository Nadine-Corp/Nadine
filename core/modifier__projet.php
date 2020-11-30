<?php
  $projet__id =  addslashes($_POST['projet__id']);
  $projet__nom =  addslashes($_POST['nom_du_projet']);
  $projet__date_de_creation =  addslashes($_POST['date_de_creation']);
  $projet__statut =  addslashes($_POST['projet__statut']);
  $diffuseur__societe =  addslashes($_POST['diffuseur__societe']);

  $sql = "SELECT * FROM Diffuseurs WHERE diffuseur__societe='".$diffuseur__societe."'";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error);

  $row = $result->fetch_assoc();
  if($row){
    $diffuseur__id = $row["diffuseur__id"];
  }

  $sql = "UPDATE Projets
  SET projet__nom = '$projet__nom', projet__date_de_creation = '$projet__date_de_creation', projet__statut = '$projet__statut', diffuseur__id = '$diffuseur__id'
  WHERE projet__id = $projet__id";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error); $conn->close();

  // Upadate Date fin

  if(!empty( $_POST['date_de_fin'] )) {
    $projet__date_de_fin =  addslashes($_POST['date_de_fin']);
    $sql = "UPDATE Projets
    SET projet__date_de_fin = '$projet__date_de_fin'
    WHERE projet__id = $projet__id";
    include 'query.php'; $result = $conn->query($sql) or die($conn->error); $conn->close();
  }


  $conn->close();


  header('Location: ../projets.php');
?>
