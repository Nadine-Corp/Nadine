<?php

/**
 * La fonction get_facture_prefix() permet de savoir si les requêtes
 * doivent être prefixé pour un devis ou une facture
 */

function get_facture_prefix($table)
{
  if (isset($table)) {

    // Récupére le bon prefix
    if ($table == 'Factures') {
      $prefix = 'facture';
    } elseif ($table == 'Devis') {
      $prefix = 'devis';
    } else {
      $prefix = 'facturea';
    }

    // Retourne le résultat au template
    return $prefix;
  }
}


/**
 * La fonction the_facture_prefix() permet d'afficher si les requêtes
 * doivent être prefixé pour un devis ou une facture
 */

function the_facture_prefix($table)
{
  if (isset($table)) {
    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);

    // Retourne le résultat au template
    echo $prefix;
  }
}
