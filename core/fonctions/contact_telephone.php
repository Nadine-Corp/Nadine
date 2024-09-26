<?php

/**
 * La fonction the_contact_telephone() affiche
 * le numéro de téléphone d'un contact
 */

function the_contact_telephone($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact__telephone = get_artiste_telephone($row);
    } else {
      $contact__telephone = get_diffuseur_telephone($row);
    }

    // Retourne le résultat au template
    echo $contact__telephone;
  }
}
