<?php

/**
 * La fonction get_artiste_ville() retourne
 * le code postal des artistes du projet demandé
 */

function get_artiste_ville($row)
{
  if (isset($row)) {
    if (isset($row['artiste__ville'])) {
      // Récupère les infos du artiste
      $artiste__ville = $row['artiste__ville'];

      // Retourne le résultat au template
      return $artiste__ville;
    }
  }
}
