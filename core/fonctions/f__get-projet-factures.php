<?php


/**
 * La fonction the_projet_factures() affiche la liste
 * de tous les factures ou devis d'un projet
 */


function the_projet_factures($row)
{
  nadine_log("Nadine lance la fonction the_projet_factures()");

  if (isset($row)) {
    // Recupère l'ID du projet
    $projet__id = get_projet_id($row);

    // Ajoute une variable
    $projet_factures = null;

    // Formate la requête SQL
    $sql = 'SELECT devis__id, devis__numero, devis__corbeille FROM Devis WHERE Devis.projet__id =' . $projet__id;
    $sql .= ' UNION SELECT facturea__id, facturea__numero, facturea__corbeille FROM Facturesacompte WHERE Facturesacompte.projet__id =' . $projet__id;
    $sql .= ' UNION SELECT facture__id, facture__numero, facture__corbeille FROM Factures WHERE Factures.projet__id =' . $projet__id;

    // Cherche tous les devis
    $loop = nadine_query('', $sql);

    if ($loop->num_rows > 0) {
      while ($row = $loop->fetch_assoc()) {
        // Récupére la bonne table
        $table = get_facture_table($row);

        // Récupére le bon prefix
        $prefix = get_facture_prefix($table);

        if (is_not_delete($row, $prefix)) {
          // Récupére le numéros de la facture
          $facture_numero = get_facture_numero($row);

          // Ajoute le numéros à la liste
          $projet_factures .= $facture_numero . ', ';
        }
      }
    };

    // Retourne le résultat au template
    echo $projet_factures;
  }
}
