<?php

/**
 * La fonction get_projet_last_facture() affiche le total
 * Hors taxe de la dernière facture ou devis d'un projet
 */

function get_projet_last_facture($row)
{
  if (isset($row)) {
    // Recupère l'ID du projet
    $projet__id = get_projet_id($row);

    // Cherche le dernier devis du projet
    $args = array(
      'FROM'     => 'Devis',
      'WHERE'    => 'projet__id =' . $projet__id,
      'ORDER BY' => 'devis__date DESC',
      'LIMIT'    => 1
    );
    $loop = nadine_query($args);
    $last_devis = $loop->fetch_assoc();

    // Cherche la dernière facture d'acompte du projet
    $args = array(
      'FROM'     => 'Facturesacompte',
      'WHERE'    => 'projet__id =' . $projet__id,
      'ORDER BY' => 'facturea__date DESC',
      'LIMIT'    => 1
    );
    $loop = nadine_query($args);
    $last_facturea = $loop->fetch_assoc();

    // Cherche la dernière facture du projet
    $args = array(
      'FROM'     => 'Factures',
      'WHERE'    => 'projet__id =' . $projet__id,
      'ORDER BY' => 'facture__date DESC',
      'LIMIT'    => 1
    );
    $loop = nadine_query($args);
    $last_facture = $loop->fetch_assoc();


    // Récupère les date de création des dernières
    // Facture ou devis
    $last_devis_date = isset($last_devis['devis__date']) ? strtotime($last_devis['devis__date']) : 0;
    $last_facturea_date = isset($last_facturea['facturea__date']) ? strtotime($last_facturea['facturea__date']) : 0;
    $last_facture_date = isset($last_facture['facture__date']) ? strtotime($last_facture['facture__date']) : 0;

    // Compare les dates de création
    $latest_timestamp = max($last_devis_date, $last_facturea_date, $last_facture_date);
    if ($latest_timestamp > 0) {
      $latest_date = date('Y-m-d H:i:s', $latest_timestamp);
    } else {
      $latest_date = '';
    }

    // Sélectione la facture ou devis la plus récente
    if ($latest_date == $last_devis_date) {
      $last_facture = $last_devis;
    } elseif ($latest_date == $last_facturea_date) {
      $last_facture = $last_facturea;
    } elseif ($latest_date == $last_facture_date) {
      $last_facture = $last_facture;
    }

    // Retourne le résultat au template
    return $last_facture;
  }
}
