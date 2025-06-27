<?php

/**
 * La fonction the_contact_prenom() affiche
 * le prénom d'un contact
 */

function the_contact_prenom($row)
{
  nadine_log("Nadine lance la fonction the_contact_prenom()");

  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact_prenom = get_artiste_prenom($row);
    } else {
      $contact_prenom = get_diffuseur_prenom($row);
    }
    nadine_log("Nadine a trouvé le prénom d'un contact : " . $contact_prenom);

    // Retourne le résultat au template
    echo $contact_prenom;
  }
}
