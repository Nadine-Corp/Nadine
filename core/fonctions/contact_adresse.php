<?php

/**
 * La fonction the_contact_adresse() affiche
 * l'adresse d'un contact
 */

function the_contact_adresse($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact__adresse = get_artiste_adresse($row);
    } else {
      $contact__adresse = get_diffuseur_adresse($row);
    }

    // Retourne le résultat au template
    echo $contact__adresse;
  }
}
