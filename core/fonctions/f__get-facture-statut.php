<?php

/**
 * La fonction get_facture_statut() récupère
 * le staut d'un devis ou d'une facture
 */

function get_facture_statut($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_facture_table($row);

    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);

    // Vérifie si la facture a déjà un statut
    // ou s'il s'agit d'une nouvelle facture
    if (isset($row[$prefix . '__statut'])) {
      // Recupère le statut de facture
      $facture_statut = $row[$prefix . '__statut'];

      // Retourne le résultat au template
      return $facture_statut;
    }
  }
}


/**
 * La fonction the_facture_statut() affiche
 * le staut d'un devis ou d'une facture
 */

function the_facture_statut($row)
{
  if (isset($row)) {
    // Recupère le statut de facture
    $facture_statut = get_facture_statut($row);

    // Retourne le résultat au template
    echo $facture_statut;
  }
}
