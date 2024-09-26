<?php

/**
 * La fonction the_contact_code_postal() affiche
 * le code postal d'un contact
 */

function the_contact_code_postal($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact__code_postal = get_artiste_code_postal($row);
    } else {
      $contact__code_postal = get_diffuseur_code_postal($row);
    }

    // Retourne le résultat au template
    echo $contact__code_postal;
  }
}
