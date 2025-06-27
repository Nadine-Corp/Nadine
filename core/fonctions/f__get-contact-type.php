<?php

/**
 * La fonction the_contact_type() retourne
 * le type de contact
 */

function the_contact_type($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    if ($table == 'Artistes') {
      $contact__type = 'Artiste-Auteur';
    } else {
      $contact__type = 'Diffuseur';
    };

    // Retourne le résultat au template
    echo $contact__type;
  }
}
