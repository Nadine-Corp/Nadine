<?php

/**
 * La fonction the_contact_siret() affiche
 * le SIRET de la société d'un contact
 */

function the_contact_siret($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact_siret = get_artiste_siret($row);
    } else {
      $contact_siret = get_diffuseur_siret($row);
    }

    // Retourne le résultat au template
    echo $contact_siret;
  }
}
