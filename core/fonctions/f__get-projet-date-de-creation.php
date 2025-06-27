<?php

/**
 * La fonction the_projet_date_de_creation()
 * affiche la date du début du projet demandé
 */

function the_projet_date_de_creation($row)
{
  if (isset($row) && isset($row['projet__date_de_creation'])) {
    // Récupère et formate la date du début du projet
    $date_de_debut = $row['projet__date_de_creation'];

    // Retourne le résultat au template
    echo $date_de_debut;
  } else {
    // Sinon : Récupère, formate et retourne
    // la date du jour au template
    the_date_today('brut');
  }
}
