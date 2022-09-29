<?php

// Ce fichier permet de créer de nouveaux devis
// et de les ajouter à la base donnée


/**
* Récuparation des valeurs
*/

  $projet__id =  addslashes($_POST['projet__id']);
  $profil__id =  addslashes($_POST['profil__id']);
  $facture__template =  addslashes($_POST['facture__template']);
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
  $devis__statut =  "Brouillon";
  $devis__date =  addslashes($_POST['facture__date']);
  $devis__numero =  addslashes($_POST['facture__numero']);
  $devis__tache_1 =  addslashes($_POST['facture__tache_1']);
  $devis__tache_2 =  addslashes($_POST['facture__tache_2']);
  $devis__tache_3 =  addslashes($_POST['facture__tache_3']);
  $devis__tache_4 =  addslashes($_POST['facture__tache_4']);
  $devis__tache_5 =  addslashes($_POST['facture__tache_5']);
  $devis__tache_6 =  addslashes($_POST['facture__tache_6']);
  $devis__tache_7 =  addslashes($_POST['facture__tache_7']);
  $devis__prix_1 =  addslashes($_POST['facture__prix_1']);
  $devis__prix_2 =  addslashes($_POST['facture__prix_2']);
  $devis__prix_3 =  addslashes($_POST['facture__prix_3']);
  $devis__prix_4 =  addslashes($_POST['facture__prix_4']);
  $devis__prix_5 =  addslashes($_POST['facture__prix_5']);
  $devis__prix_6 =  addslashes($_POST['facture__prix_6']);
  $devis__prix_7 =  addslashes($_POST['facture__prix_7']);
  $devis__total =  addslashes($_POST['devis__total']);


  /**
  * Mettre à jour la base de données
  */

  $sql = "INSERT INTO Devis ( projet__id, profil__id, devis__template, projet__nom, projet__numero, diffuseur__id, diffuseur__societe, diffuseur__siret, diffuseur__civilite, diffuseur__prenom, diffuseur__nom, diffuseur__adresse, diffuseur__code_postal, diffuseur__ville, diffuseur__telephone, diffuseur__email, diffuseur__website, devis__statut, devis__date, devis__numero, devis__tache_1, devis__tache_2, devis__tache_3, devis__tache_4, devis__tache_5, devis__tache_6, devis__tache_7, devis__prix_1, devis__prix_2, devis__prix_3, devis__prix_4, devis__prix_5, devis__prix_6, devis__prix_7, devis__total )
  VALUES ('$projet__id', '$profil__id', '$facture__template', '$projet__nom', '$projet__numero', '$diffuseur__id', '$diffuseur__societe', '$diffuseur__siret', '$diffuseur__civilite', '$diffuseur__prenom', '$diffuseur__nom', '$diffuseur__adresse', '$diffuseur__code_postal', '$diffuseur__ville', '$diffuseur__telephone', '$diffuseur__email', '$diffuseur__website', '$devis__statut', '$devis__date', '$devis__numero', '$devis__tache_1', '$devis__tache_2', '$devis__tache_3', '$devis__tache_4', '$devis__tache_5', '$devis__tache_6', '$devis__tache_7', '$devis__prix_1', '$devis__prix_2', '$devis__prix_3', '$devis__prix_4', '$devis__prix_5', '$devis__prix_6', '$devis__prix_7', '$devis__total')";
  include 'query.php'; $result = $conn->query($sql) or die($conn->error);



  /**
  * Redirection vers la page projet-single
  */

  header('Location: ../projet__single.php?projet__id='.$projet__id);
?>
