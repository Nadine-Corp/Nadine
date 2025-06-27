<?php

/**
 * La fonction get_facture_table() permet de savoir si le template
 * doit afficher les infos d'un devis ou d'une facture
 */

function get_facture_table($row, $table = '')
{
  if (isset($row)) {
    // Récupére la bonne table
    if ($table != '') {
      // Formate au besoin le nom de la table
      $table = ucfirst($table);

      // Retourne le résultat au template
      return $table;
    }

    // Récupére la bonne table
    if (!empty($row['devis__numero'])) {
      $table = 'devis';
    };
    if (!empty($row['facture__numero'])) {
      $table = 'factures';
    };
    if (!empty($row['facturea__numero'])) {
      $table = 'facturesacompte';
    };

    // Formate au besoin le nom de la table
    $table = ucfirst($table);

    // Retourne le résultat au template
    return $table;
  }
}


/**
 * La fonction the_facture_table() d'afficher si le template
 * doit afficher les infos d'un devis ou d'une facture
 */

function the_facture_table($row)
{
  if (isset($row)) {
    if (!empty($row['devis__numero'])) {
      $table = 'Devis';
    };
    if (!empty($row['facture__numero'])) {
      $table = 'Facture';
    };
    if (!empty($row['facturea__numero'])) {
      $table = "Facture d'acompte";
    };

    // Retourne le résultat au template
    echo $table;
  }
}
