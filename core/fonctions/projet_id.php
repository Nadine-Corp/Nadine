<?php

/**
 * La fonction get_projet_id() récupère
 * l'ID d'un projet demandé
 */

function get_projet_id($row)
{
  if (isset($row)) {
    if (isset($row["projet__id"])) {
      // Recupère l'ID du projet
      $projet__id = $row["projet__id"];

      // Retourne le résultat au template
      return $projet__id;
    }
  }
}


/**
 * La fonction the_projet_id() affiche l'ID d'un projet demandé
 */

function the_projet_id($row)
{
  if (isset($row)) {
    // Recupère l'ID du projet
    $projet__id = get_projet_id($row);

    // Retourne le résultat au template
    echo $projet__id;
  }
}
