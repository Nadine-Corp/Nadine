<?php

/**
 * La fonction get_facture_date() récupère
 * la date de création du devis ou de la facture
 */

function get_facture_date($row, $format = 'abrv')
{
  if (isset($row)) {
    // Récupére la bonne table
    $table = get_facture_table($row);

    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);


    // Vérifie si la date existe
    if (isset($row[$prefix . '__date'])) {
      // Recupère la date
      $facture_date = date_create($row[$prefix . '__date']);

      // Formate la réponse
      $facture_date = nadine_date($facture_date, $format);

      // Retourne le résultat au template
      return $facture_date;
    }
  }

  // Sinon : Récupère, formate et retourne
  // la date du jour au template
  return get_date_today($format);
}


/**
 * La fonction the_facture_date() affiche
 * la date de création du devis ou de la facture
 */

function the_facture_date($row, $format = 'abrv')
{
  if (isset($row)) {
    // Récupère la date de création du devis ou de la facture
    $facture_date = get_facture_date($row, $format);

    // Retourne le résultat au template
    echo $facture_date;
  }
}
