<?php
  $profil__societe =  addslashes($_POST['societe']);
  $profil__siret =  addslashes($_POST['siret']);
  $profil__civilite =  addslashes($_POST['civilite']);
  $profil__prenom =  addslashes($_POST['prenom']);
  $profil__nom =  addslashes($_POST['nom']);
  $profil__adresse =  addslashes($_POST['adresse']);
  $profil__code_postal =  addslashes($_POST['code_postal']);
  $profil__ville =  addslashes($_POST['ville']);
  $profil__telephone =  addslashes($_POST['telephone']);
  $profil__email =  addslashes($_POST['email']);
  $profil__website =  addslashes($_POST['website']);
  $profil__numero_secu =  addslashes($_POST['numero_secu']);
  $profil__numero_mda =  addslashes($_POST['numero_mda']);
  $profil__titulaire_du_compte =  addslashes($_POST['titulaire_du_compte']);
  $profil__iban =  addslashes($_POST['iban']);
  $profil__bic =  addslashes($_POST['bic']);



  $sql = "INSERT INTO profil (profil__societe, profil__siret, profil__civilite, profil__prenom, profil__nom, profil__adresse, profil__code_postal, profil__ville, profil__telephone, profil__email, profil__website, profil__numero_secu, profil__numero_mda, profil__titulaire_du_compte, profil__iban, profil__bic)
  VALUES ('$profil__societe', '$profil__siret', '$profil__civilite', '$profil__prenom', '$profil__nom', '$profil__adresse', '$profil__code_postal', '$profil__ville', '$profil__telephone', '$profil__email', '$profil__website', '$profil__numero_secu', '$profil__numero_mda', '$profil__titulaire_du_compte', '$profil__iban', '$profil__bic' )";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error); $conn->close();

  header('Location: ../profil.php');
?>
