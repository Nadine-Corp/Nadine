<?php

/**
 * La fonction get_artiste_code_postal() retourne
 * le code postal des artistes du projet demandé
 */

function get_artiste_code_postal($row)
{
  if (isset($row)) {
    if (isset($row['artiste__code_postal'])) {
      // Récupère les infos du artiste
      $artiste__code_postal = $row['artiste__code_postal'];

      // Formate le résultat
      $artiste__code_postal = str_replace(' ', '', $artiste__code_postal);

      // Retourne le résultat au template
      return $artiste__code_postal;
    }
  }
}
