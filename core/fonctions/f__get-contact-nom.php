<?php

/**
 * La fonction the_contact_nom() affiche
 * le nom d'un contact
 */

function the_contact_nom($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact_nom = get_artiste_nom($row);
    } else {
      $contact_nom = get_diffuseur_nom($row);
    }

    // Retourne le résultat au template
    echo $contact_nom;
  }
}
