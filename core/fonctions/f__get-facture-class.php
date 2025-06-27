<?php

/**
 * La fonction the_facture_class() affiche qq class
 * dans la balise <article> des devis ou des facture
 */

function the_facture_class($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_facture_table($row);

    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);

    // Ajoute l'id comme class
    $class = 'p-facture__' . $row[$prefix . '__id'] . ' ';

    // Recupère le statut de facture
    $facture_statut = $row[$prefix . '__statut'];
    $class .= sanitize('p-facture__' . $facture_statut);

    // Retourne le résultat au template
    echo $class;
  }
}
