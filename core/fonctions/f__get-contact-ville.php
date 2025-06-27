<?php

/**
 * La fonction the_contact_ville() affiche
 * la ville d'un contact
 */

function the_contact_ville($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact__ville = get_artiste_ville($row);
    } else {
      $contact__ville = get_diffuseur_ville($row);
    }

    // Retourne le résultat au template
    echo $contact__ville;
  }
}
