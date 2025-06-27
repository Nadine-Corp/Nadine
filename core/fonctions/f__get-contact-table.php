<?php

/**
 * La fonction get_contact_table() permet de savoir si le template
 * doit afficher les infos d'un diffuseur ou d'un artiste
 */

function get_contact_table($row)
{
  if (isset($row)) {
    if (!empty($row['diffuseur__id']) || isset($row['diffuseur__id'])) {
      $table = 'Diffuseurs';
    } else {
      $table = 'Artistes';
    };

    // Retourne le résultat au template
    return $table;
  }
}


/**
 * La fonction the_contact_table() affiche
 * la table du contact
 */

function the_contact_table($row)

{
  if (isset($row)) {
    // Récupère les infos du contact
    $table = get_contact_table($row);

    // Retourne le résultat au template
    echo $table;
  }
}
