<?php
  $diffuseur__id =  addslashes($_POST['diffuseur__id']);
  $diffuseur__societe =  addslashes($_POST['societe']);
  $diffuseur__siret =  addslashes($_POST['siret']);
  $diffuseur__civilite =  addslashes($_POST['civilite']);
  $diffuseur__prenom =  addslashes($_POST['prenom']);
  $diffuseur__nom =  addslashes($_POST['nom']);
  $diffuseur__adresse =  addslashes($_POST['adresse']);
  $diffuseur__code_postal =  addslashes($_POST['code_postal']);
  $diffuseur__ville =  addslashes($_POST['ville']);
  $diffuseur__telephone =  addslashes($_POST['telephone']);
  $diffuseur__email =  addslashes($_POST['email']);
  $diffuseur__website =  addslashes($_POST['website']);


  $sql = "UPDATE Diffuseurs
  SET diffuseur__societe = '$diffuseur__societe', diffuseur__siret = '$diffuseur__siret', diffuseur__civilite = '$diffuseur__civilite', diffuseur__prenom = '$diffuseur__prenom', diffuseur__nom = '$diffuseur__nom', diffuseur__adresse = '$diffuseur__adresse', diffuseur__code_postal = '$diffuseur__code_postal', diffuseur__ville = '$diffuseur__ville', diffuseur__telephone = '$diffuseur__telephone', diffuseur__email = '$diffuseur__email', diffuseur__website = '$diffuseur__website'
  WHERE diffuseur__id = $diffuseur__id";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error); $conn->close();

  header('Location: ../diffuseurs.php');
?>
