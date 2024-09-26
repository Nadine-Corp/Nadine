<?php

/**
 * La fonction get_artiste_adresse() retourne
 * l'adresse des artistes du projet demandé
 */

function get_artiste_adresse($row)
{
  if (isset($row)) {
    if (isset($row['artiste__adresse'])) {
      // Récupère les infos du artiste
      $artiste__adresse = $row['artiste__adresse'];

      // Retourne le résultat au template
      return $artiste__adresse;
    }
  }
}
