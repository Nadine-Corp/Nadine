<?php

/**
 * La fonction the_contact_name() affiche
 * la civilité, le Prénom et le nom d'un contact
 */

function the_contact_name($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact_name = get_artiste_name($row);
    } else {
      $contact_name = get_diffuseur_name($row);
    }

    // Retourne le résultat au template
    echo $contact_name;
  }
}
