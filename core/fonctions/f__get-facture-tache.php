<?php

/**
 * La fonction the_facture_tache() permet d'afficher
 * la description de la tâche dans une facture ou un devis
 */

function the_facture_tache($row, $numTache = 1)
{
  if (isset($row)) {

    // Vérfie si la facture ou devis
    // doit être dupliquée

    if (isset($_GET['from__table'])) {
      // Récupére la bonne table
      $table = $_GET['from__table'];

      // Récupére le bon prefix
      $prefix = get_facture_prefix($table);

      // Récupére l'ID de la facture
      $facture__id = $_GET['from__id'];

      // Récupère les infos de la facture ou devis
      // à dupliquer
      $args = array(
        'FROM'     => $table,
        'WHERE'    => $prefix . '__id' . ' = ' . $facture__id
      );
      $loop = nadine_query($args);
      // Récupère l'ID du Diffuseur
      // et le Template (si la facture exite déjà)
      if ($loop->num_rows > 0) {
        $row = $loop->fetch_assoc();
      }
    } else {

      // Récupére la bonne table
      $table = get_facture_table($row);

      // Récupére le bon prefix
      $prefix = get_facture_prefix($table);
    }

    // Vérifie si la tache existe
    if (isset($row[$prefix . '__tache_' . $numTache])) {
      // Recupère la tâche 
      $facture_tache = $row[$prefix . '__tache_' . $numTache];

      // Retourne le résultat au template
      echo $facture_tache;
    }
  }
}
