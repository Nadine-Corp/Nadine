<?php

/**
 * La fonction get_facture_id() retourne
 * l'ID d'une facture ou devis
 */

function get_facture_id($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_facture_table($row);

    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);

    // Récupére l'ID de la facture ou du devis
    if (isset($row[$prefix . '__id'])) {
      $facture__id = $row[$prefix . '__id'];
    } else {
      $facture__id = 'new';
    }

    // Retourne le résultat au template
    return $facture__id;
  }
}


/**
 * La fonction the_facture_id() affiche
 * l'ID d'une facture ou devis
 */

function the_facture_id($row)
{
  if (isset($row)) {
    // Récupére l'ID de la facture ou du devis
    $facture__id = get_facture_id($row);

    // Retourne le résultat au template
    echo $facture__id;
  }
}
