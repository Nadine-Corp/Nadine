<?php

/**
 * La fonction get_contact_id() retourne
 * l'ID d'un contact demandé
 */

function get_contact_id($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact_id = get_artiste_id($row);
    } else {
      $contact_id = get_diffuseur_id($row);
    }

    // Retourne le résultat au template
    return $contact_id;
  }
}


/**
 * La fonction the_contact_id() affiche
 * l'ID d'un contact demandé
 */

function the_contact_id($row)
{

  nadine_log("Nadine lance la fonction the_contact_id()");

  if (isset($row)) {
    // Récupère les infos du contact
    $contact_id = get_contact_id($row);

    // Retourne le résultat au template
    echo $contact_id;
  }
}
