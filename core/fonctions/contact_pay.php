<?php

/**
 * La fonction the_contact_pays() affiche
 * le pays d'un contact
 */

function the_contact_pays($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact__pays = get_artiste_pays($row);
    } else {
      $contact__pays = get_diffuseur_pays($row);
    }

    // Retourne le résultat au template
    echo $contact__pays;
  }
}
