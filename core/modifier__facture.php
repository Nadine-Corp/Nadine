<?php
  $facture__id = addslashes($_POST['facture__id']);
  $facture__statut = addslashes($_POST['facture__statut']);
  $facture__date =  addslashes($_POST['facture__date']);
  $facture__tache_1 =  addslashes($_POST['facture__tache_1']);
  $facture__tache_2 =  addslashes($_POST['facture__tache_2']);
  $facture__tache_3 =  addslashes($_POST['facture__tache_3']);
  $facture__tache_4 =  addslashes($_POST['facture__tache_4']);
  $facture__tache_5 =  addslashes($_POST['facture__tache_5']);
  $facture__tache_6 =  addslashes($_POST['facture__tache_6']);
  $facture__tache_7 =  addslashes($_POST['facture__tache_7']);
  $facture__prix_1 =  addslashes($_POST['facture__prix_1']);
  $facture__prix_2 =  addslashes($_POST['facture__prix_2']);
  $facture__prix_3 =  addslashes($_POST['facture__prix_3']);
  $facture__prix_4 =  addslashes($_POST['facture__prix_4']);
  $facture__prix_5 =  addslashes($_POST['facture__prix_5']);
  $facture__prix_6 =  addslashes($_POST['facture__prix_6']);
  $facture__prix_7 =  addslashes($_POST['facture__prix_7']);
  $facture__total =  addslashes($_POST['facture__total']);
  $projet__id =  addslashes($_POST['projet__id']);
  $projet__nom =  addslashes($_POST['projet__nom']);
  $projet__numero =  addslashes($_POST['projet__numero']);
  $diffuseur__id =  addslashes($_POST['diffuseur__id']);
  $diffuseur__societe =  addslashes($_POST['diffuseur__societe']);
  $diffuseur__siret =  addslashes($_POST['diffuseur__siret']);
  $diffuseur__civilite =  addslashes($_POST['diffuseur__civilite']);
  $diffuseur__prenom =  addslashes($_POST['diffuseur__prenom']);
  $diffuseur__nom =  addslashes($_POST['diffuseur__nom']);
  $diffuseur__adresse =  addslashes($_POST['diffuseur__adresse']);
  $diffuseur__code_postal =  addslashes($_POST['diffuseur__code_postal']);
  $diffuseur__ville =  addslashes($_POST['diffuseur__ville']);
  $diffuseur__telephone =  addslashes($_POST['diffuseur__telephone']);
  $diffuseur__email =  addslashes($_POST['diffuseur__email']);
  $diffuseur__website =  addslashes($_POST['diffuseur__website']);


  $sql = "UPDATE Factures
  SET projet__id = '$projet__id', projet__nom = '$projet__nom', projet__numero = '$projet__numero', diffuseur__id = '$diffuseur__id', diffuseur__societe = '$diffuseur__societe', diffuseur__siret = '$diffuseur__siret', diffuseur__civilite = '$diffuseur__civilite', diffuseur__prenom = '$diffuseur__prenom', diffuseur__nom = '$diffuseur__nom', diffuseur__adresse = '$diffuseur__adresse', diffuseur__code_postal = '$diffuseur__code_postal', diffuseur__ville = '$diffuseur__ville', diffuseur__telephone = '$diffuseur__telephone', diffuseur__email = '$diffuseur__email', diffuseur__website = '$diffuseur__website', facture__statut = '$facture__statut', facture__date = '$facture__date', facture__tache_1 = '$facture__tache_1', facture__tache_2 = '$facture__tache_2', facture__tache_3 = '$facture__tache_3', facture__tache_4 = '$facture__tache_4', facture__tache_5 = '$facture__tache_5', facture__tache_6 = '$facture__tache_6', facture__tache_7 = '$facture__tache_7', facture__prix_1 = '$facture__prix_1', facture__prix_2 = '$facture__prix_2', facture__prix_3 = '$facture__prix_3', facture__prix_4 = '$facture__prix_4', facture__prix_5 = '$facture__prix_5', facture__prix_6 = '$facture__prix_6', facture__prix_7 = '$facture__prix_7', facture__total = '$facture__total'
  WHERE facture__id = $facture__id";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error); $conn->close();






  header('Location: ../projet__single.php?projet__id='.$projet__id);
?>
