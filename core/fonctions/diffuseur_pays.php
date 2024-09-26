<?php

/**
 * La fonction get_diffuseur_pays() retourne
 * le pays des diffuseur du projet demandé
 */

function get_diffuseur_pays($row)
{
  if (isset($row)) {
    if (!empty($row['diffuseur__pays'])) {
      // Récupère les infos du artiste
      $diffuseur__pays = $row['diffuseur__pays'];

      // Formate le résultat
      $diffuseur__pays = ucwords(strtolower($diffuseur__pays));

      // Retourne le résultat au template
      return $diffuseur__pays;
    }
  }
}
