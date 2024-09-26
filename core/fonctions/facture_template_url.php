<?php

/**
 * La fonction get_facture_template_url() permet de sélectionner
 * le bon template pour afficher les devis ou facture
 */

function get_facture_template_url($projet__id, $table, $facture__id)
{
  if (isset($projet__id) && isset($table) && isset($facture__id)) {
    // Récupére le bon prefix
    $prefix = get_facture_prefix($table);

    // Récupére la bon nom de fichier
    if ($table == 'Factures') {
      $facture__file = 'facture';
    } elseif ($table == 'Devis') {
      $facture__file = 'devis';
    } else {
      $facture__file = 'Facturesacompte';
    }

    // Récupère les infos du Diffuseur
    if ($facture__id == 'new') {
      $args = array(
        'FROM'     => 'Projets, Diffuseurs',
        'WHERE'    => 'Projets.projet__id =' . $projet__id,
        'AND'      => 'Projets.diffuseur__id = Diffuseurs.diffuseur__id'
      );
    } else {
      $args = array(
        'FROM'     => $table,
        'WHERE'    => $prefix . '__id' . ' = ' . $facture__id
      );
    }
    $loop = nadine_query($args);

    // Récupère l'ID du Diffuseur
    // et le Template (si la facture exite déjà)
    if ($loop->num_rows > 0) {

      $row = $loop->fetch_assoc();
      $diffuseur__id = $row['diffuseur__id'];

      // Vérifie si un format de facture alternatif doit être appliqué
      if ($facture__file != 'devis') {

        $facture__alt = '';

        // Vérifie si le précompte doit être appliqué
        if (is_precompte($diffuseur__id, $table, $facture__id)) {
          $facture__alt = '__precompte';
        }
        // Vérifie si les contributions doivent être appliquées
        if (is_sans_contribution($row)) {
          $facture__alt = '__sanscontrib';
        }
        $facture__file .= $facture__alt;
      };

      // Formate le nom du fichier
      $facture__file = $facture__file . '.php';

      // Récupère le nom du template
      $facture__folder = get_facture_template($row, $table);

      // Formate le résultat
      $facture__templateurl = '/template_facture/' . $facture__folder . '/' . $facture__file;
      nadine_log("Nadine ouvre le fichier :\n" . $facture__templateurl);

      // Retourne le résultat au template
      return $facture__templateurl;
    }
  }
}
