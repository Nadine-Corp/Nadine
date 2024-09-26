<?php

/**
 * La fonction the_projet_last_total_auteur() affiche le total
 * taxe comprise de la dernière facture ou devis d'un projet
 */

function the_projet_last_total_auteur($row)
{
  nadine_log("Nadine lance la fonction the_projet_last_total_auteur()");
  if (isset($row)) {
    // Cherche la dernière facture ou devis
    $last_facture = get_projet_last_facture($row);

    // Récupére le total de la dernière facture ou devis
    $last_total = get_facture_total_auteur($last_facture);

    // Retourne le résultat au template
    echo $last_total;
  }
}
