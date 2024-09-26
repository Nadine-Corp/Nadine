<?php

/**
 * La fonction the_projet_date_de_fin()
 * affiche la date de fin du projet demandé
 */

function the_projet_date_de_fin($row)
{
  if (isset($row) && isset($row['projet__date_de_fin'])) {
    // Récupère et formate la date du début du projet
    $date_de_fin = $row['projet__date_de_fin'];

    // Retourne le résultat au template
    echo $date_de_fin;
  }
}
