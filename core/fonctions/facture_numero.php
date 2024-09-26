<?php

/**
 * La fonction get_facture_numero() récupère
 * le numero d'un devis ou d'une facture
 */

function get_facture_numero($row, $table = '')
{
  nadine_log("Nadine lance la fonction get_facture_numero()");

  if (isset($row)) {
    // Récupére la bonne table
    $table = get_facture_table($row, $table);

    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);

    // Vérifie si le numero de facture existe
    if (isset($row[$prefix . '__numero'])) {
      $facture_numero = $row[$prefix . '__numero'];
      // Formate le résultat
      $facture_numero = str_replace(' ', '', $facture_numero);
    } else {
      $facture_numero = get_facture_new_numero($table);
    };

    // Retourne le résultat au template
    return $facture_numero;
  }
}


/**
 * La fonction the_facture_numero() affiche
 * le numero d'un devis ou d'une facture
 */

function the_facture_numero($row, $table = '')
{
  if (isset($row)) {
    // Recupère le numero de facture
    $facture_numero = get_facture_numero($row, $table);

    // Retourne le résultat au template
    echo $facture_numero;
  }
}
