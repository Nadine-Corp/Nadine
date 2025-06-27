<?php


/**
 * La fonction get_contact_civilite() retourne
 * la civilité d'un contact
 */

function get_contact_civilite($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact_civilite = get_artiste_civilite($row);
    } else {
      $contact_civilite = get_diffuseur_civilite($row);
    }

    // Retourne le résultat au template
    return $contact_civilite;
  }
}


/**
 * La fonction the_contact_civilite() affiche
 * la civilité d'un contact
 */

function the_contact_civilite($row)
{
  if (isset($row)) {
    // Récupère les infos du contact
    $contact_civilite = get_contact_civilite($row);

    // Retourne le résultat au template
    echo $contact_civilite;
  }
}
