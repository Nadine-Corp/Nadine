<?php
  $artiste__id =  addslashes($_POST['artiste__id']);
  $artiste__societe =  addslashes($_POST['societe']);
  $artiste__siret =  addslashes($_POST['siret']);
  $artiste__civilite =  addslashes($_POST['civilite']);
  $artiste__prenom =  addslashes($_POST['prenom']);
  $artiste__nom =  addslashes($_POST['nom']);
  $artiste__numero_secu =  addslashes($_POST['numero_secu']);
  $artiste__numero_mda =  addslashes($_POST['numero_mda']);
  $artiste__adresse =  addslashes($_POST['adresse']);
  $artiste__code_postal =  addslashes($_POST['code_postal']);
  $artiste__ville =  addslashes($_POST['ville']);
  $artiste__telephone =  addslashes($_POST['telephone']);
  $artiste__email =  addslashes($_POST['email']);
  $artiste__website =  addslashes($_POST['website']);


  $sql = "UPDATE Artistes
  SET artiste__societe = '$artiste__societe', artiste__siret = '$artiste__siret', artiste__civilite = '$artiste__civilite', artiste__prenom = '$artiste__prenom', artiste__nom = '$artiste__nom', artiste__numero_secu = '$artiste__numero_secu', artiste__numero_mda = '$artiste__numero_mda', artiste__adresse = '$artiste__adresse', artiste__code_postal = '$artiste__code_postal', artiste__ville = '$artiste__ville', artiste__telephone = '$artiste__telephone', artiste__email = '$artiste__email', artiste__website = '$artiste__website'
  WHERE artiste__id = $artiste__id";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error); $conn->close();

  header('Location: ../artistes.php');
?>
