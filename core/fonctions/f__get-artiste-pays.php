<?php

/**
 * La fonction get_artiste_pays() retourne
 * le pays des artistes du projet demandé
 */

function get_artiste_pays($row)
{
  if (isset($row)) {
    if (isset($row['artiste__pays'])) {
      // Récupère les infos du artiste
      $artiste__pays = $row['artiste__pays'];

      // Formate le résultat
      $artiste__pays = ucwords(strtolower($artiste__pays));

      // Retourne le résultat au template
      return $artiste__pays;
    }
  }
}
