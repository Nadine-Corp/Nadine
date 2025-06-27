<?php

/**
 * La fonction get_facture_total_ht() récupère
 * le total hors taxe d'une facture ou devis
 */

function get_facture_total_ht($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_facture_table($row);

    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);

    // Ajoute une variable pour calculer le total
    $facture_total_ht = 0;

    // Recupère le prix de chaque de tâche de la facture
    for ($i = 1; $i <= 7; $i++) {
      $prix = $row[$prefix  . '__prix_' . $i];
      $prix = floatval($prix);
      $facture_total_ht += $prix;
    }

    // Formate le résultat
    $facture_total_ht = nadine_prix($facture_total_ht);

    // Retourne le résultat au template
    return $facture_total_ht;
  }
}


/**
 * La fonction the_facture_total_ht() affiche
 * le total hors taxe d'une facture ou devis
 */

function the_facture_total_ht($row)
{
  if (isset($row)) {
    // Récupére le total
    $facture_total_ht = get_facture_total_ht($row);

    // Retourne le résultat au template
    return $facture_total_ht;
  }
}
