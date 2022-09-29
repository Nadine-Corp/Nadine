<?php

// Ce fichier permet de créer des messages personnalisé
// pour envoyer ses factures. Pour modifier le gabarit,
// RDV sur la page profil.



  /**
  * Récuparation de l'ID de la facture
  */

  $facture__id = $_GET['facture__id'];


  /**
  * Récupérer le dernier Profil créé
  */

  $sql = "SELECT MAX(profil__id) AS LastProfil FROM Profil";
  include './core/query.php'; $result = $conn->query($sql) or die($conn->error);
  $row = $result->fetch_assoc();
  if($row){
    $profil__id =  $row["LastProfil"];
  }


  /**
  * Récuparation des données dans la base
  */

  $sql = "SELECT * FROM Factures, Profil WHERE Factures.facture__id = '".$facture__id."' AND Profil.profil__id = '".$profil__id."'";
  include './core/query.php'; $result = $conn->query($sql) or die($conn->error);
  if ($result->num_rows > 0):
  while($row = $result->fetch_assoc()):


  /**
  * Récuparation du gabarit
  */

  $profil__msg_facture =  $row["profil__msg_facture"];


  /**
  * Remplacement des {{String}} par les vraies $Variables
  */

  $vars = array(
    '{{diffuseur__civilite}}'     => $row["diffuseur__civilite"],
    '{{diffuseur__prenom}}'       => $row["diffuseur__prenom"],
    '{{diffuseur__nom}}'          => $row["diffuseur__nom"],
    '{{diffuseur__societe}}'      => $row["diffuseur__societe"],
    '{{diffuseur__email}}'        => $row["diffuseur__email"],
    '{{projet__nom}}'             => $row["projet__nom"],
    '{{profil__societe}}'         => $row["profil__societe"],
    '{{profil__civilite}}'        => $row["profil__civilite"],
    '{{profil__prenom}}'          => $row["profil__prenom"],
    '{{profil__nom}}'             => $row["profil__nom"],
    '{{profil__numero_secu}}'     => $row["profil__numero_secu"],
    '{{profil__titulaire_du_compte}}' => $row["profil__titulaire_du_compte"],
    '{{profil__iban}}'            => $row["profil__iban"],
    '{{profil__bic}}'             => $row["profil__bic"]
  );

  // Afficher le message

  echo strtr(nl2br($profil__msg_facture), $vars);
  echo "<style>*{font-family: sans-serif;}</style>"
  ?>




<?php endwhile; ?>
<?php else: ?>
<p>Chef, on n'a rien trouvé ici...</p>
<?php endif; $conn->close(); ?>
