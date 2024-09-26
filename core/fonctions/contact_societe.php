<?php

/**
 * La fonction the_contact_societe() affiche
 * la civilité, le Prénom et le nom d'un contact
 */

function the_contact_societe($row)
{
  nadine_log("Nadine lance la fonction the_contact_societe()");

  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère les infos du contact
    if ($table == 'Artistes') {
      $contact_societe = get_artiste_societe($row);
    } else {
      $contact_societe = get_diffuseur_societe($row);
    }

    // Retourne le résultat au template
    echo $contact_societe;
  }
}
