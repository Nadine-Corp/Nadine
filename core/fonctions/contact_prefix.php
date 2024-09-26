<?php


/**
 * La fonction get_contact_prefix() permet de savoir
 * comment prefixé les infos avant de faire une demande
 * à la base de données
 */

function get_contact_prefix($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_contact_table($row);

    // Récupère le prefix du contact
    if ($table == 'Artistes') {
      $prefix = 'artiste';
    } else {
      $prefix = 'diffuseur';
    }

    // Retourne le résultat au template
    return $prefix;
  }
}


/**
 * La fonction get_contact_prefix() affiche
 * le prefixe des infos de la base de données
 */

function the_contact_prefix($row)

{
  if (isset($row)) {
    // Récupère le prefix du contact
    $prefix = get_contact_prefix($row);

    // Retourne le résultat au template
    echo $prefix;
  }
}
