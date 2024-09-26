<?php

/**
 * La fonction the_facture_link() affiche
 * le lien vers la page devis ou facture
 */

function the_facture_link($row)
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_facture_table($row);

    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);

    // Vérifie si la facture a déjà un numéros
    // ou s'il s'agit d'une nouvelle facture
    if (isset($row[$prefix . '__id'])) {
      // Recupère le numero de facture
      $facture__id = $row[$prefix . '__id'];

      // Recupère le numero de facture
      $projet__id = $row['projet__id'];

      // Formate le résultat
      $facture__link = './facture__single.php?projet__id=' . $projet__id . '&' . $prefix . '__id=' . $facture__id;

      // Retourne le résultat au template
      echo $facture__link;
    }
  }
}
