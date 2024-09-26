<?php

/**
 * La fonction the_contact_website() affiche
 * le site web d'un contact
 */

function the_contact_website($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact__website = get_artiste_website($row);
    } else {
      $contact__website = get_diffuseur_website($row);
    }

    // Retourne le résultat au template
    echo $contact__website;
  }
}
