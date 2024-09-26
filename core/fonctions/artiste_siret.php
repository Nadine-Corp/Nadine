<?php

/**
 * La fonction get_artiste_siret() retourne
 * le SIRET d'un artiste
 */

function get_artiste_siret($row)
{
  if (isset($row)) {
    if (isset($row["artiste__siret"])) {
      // Récupère les infos de l'artiste
      $artiste_siret = $row["artiste__siret"];

      // Retourne le résultat au template
      return $artiste_siret;
    }
  }
}
