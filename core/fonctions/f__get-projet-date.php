<?php


/**
 * La fonction the_projet_date() affiche les dates
 * début et de fin du projet demandé
 */

function the_projet_date($row)
{
  if (isset($row)) {
    if (isset($row["projet__date_de_creation"])) {
      // Récupère et formate la date du début du projet
      $date_de_debut = date_create($row["projet__date_de_creation"]);
      $date_de_debut = nadine_date($date_de_debut);

      // Récupère et formate la date de fin du projet (si elle existe)
      if (!empty($row["projet__date_de_fin"])) {
        $date_de_fin = date_create($row["projet__date_de_fin"]);
        $date_de_fin = " — " . nadine_date($date_de_fin);
      } else {
        $date_de_fin = "";
      };

      // Retourne le résultat au template
      echo $date_de_debut . $date_de_fin;
    }
  }
}
