<?php

/**
 * La fonction get_facture_total_auteur()récupère
 * le total d'un devis ou d'une facture
 */

function get_facture_total_auteur($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_facture_table($row);

    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);

    // Recupère le total de facture
    $facture_total = $row[$prefix  . '__total'];

    // Formate le résultat
    $facture_total = nadine_prix($facture_total);

    // Retourne le résultat au template
    return $facture_total;
  }
}


/*
 * La fonction the_facture_total_auteur() affiche
 * le total d'une facture ou devis
 */

function the_facture_total_auteur($row)
{
  if (isset($row)) {
    // Récupére le total d'une facture ou devis
    $facture_total = get_facture_total_auteur($row);

    // Retourne le résultat au template
    echo $facture_total;
  }
}
