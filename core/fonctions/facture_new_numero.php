<?php

/**
 * La fonction get_facture_new_numero() permet de créer
 * un nouveau numero de devis ou de facture
 */

function get_facture_new_numero($table)
{
  nadine_log("Nadine lance la fonction get_facture_new_numero()");

  if (isset($table)) {
    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);

    // Récupère le dernier numéros de facture ou devis dans la base de donnée
    $args = array(
      'FROM'     => $table,
      'ORDER BY' => $prefix . '__id',
      'ORDER'    => 'DESC',
      'LIMIT'    => '1',
    );
    $loop = nadine_query($args);

    // Récupère le dernier numéros de facture ou devis
    if ($loop->num_rows > 0) {

      while ($row = $loop->fetch_assoc()) {
        $facture__id = $row[$prefix . '__id'];
      }
    } else {
      // Si aucun numéros de facture ou devis est récupéré :
      // formate Facture ID pour que Nadine se prépare
      // à enregister sa première facture ou devis
      $facture__id = 0;
    }

    // Récupère les infos du dernier profil
    $args = array(
      'FROM'     => 'Profil',
      'ORDER BY' => 'Profil__id',
      'ORDER'    => 'DESC',
      'LIMIT'    => '1',
    );
    $loop = nadine_query($args);

    // Récupère les initiales du profil de l'utilisateur
    if ($loop->num_rows > 0) {
      while ($row = $loop->fetch_assoc()) {

        // Vérifie si le numero de facture existe
        if (isset($row['profil__initiales'])) {
          $initiales = $row['profil__initiales'];
        } else {
          $initiales = 'NA';
        }
      }
    }

    // Récupére le bon acronyme
    if ($table == 'devis') {
      $initiales = 'D' . $initiales;
    };
    if ($table == 'facturesacompte') {
      $initiales = 'A' . $initiales;
    };
    if ($table == 'factures') {
      $initiales = 'F' . $initiales;
    };

    // Récupére l'année en cours
    $year = date('Y');

    // Formate le résultat
    $facture_new_numero = $facture__id + 1;
    $facture_new_numero = $initiales . '.' . $year . '.' . $facture_new_numero;

    // Retourne le résultat au template
    return $facture_new_numero;
  }
}
