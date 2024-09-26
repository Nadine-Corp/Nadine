<?php

/**
 * La fonction the_contact_email() affiche
 * le courriel d'un contact
 */

function the_contact_email($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact__email = get_artiste_email($row);
    } else {
      $contact__email = get_diffuseur_email($row);
    }

    // Retourne le résultat au template
    echo $contact__email;
  }
}
