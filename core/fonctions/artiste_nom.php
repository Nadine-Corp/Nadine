<?php

/**
 * La fonction get_artiste_nom() retourne
 * le nom d'un artiste demandé
 */

function get_artiste_nom($row)
{
  if (isset($row)) {
    if (isset($row["artiste__nom"])) {
      // Récupère les infos de l'artiste
      $artiste_nom = $row["artiste__nom"];

      // Formate le résultat
      $artiste_nom = ucwords(strtolower($artiste_nom));

      // Retourne le résultat au template
      return $artiste_nom;
    }
  }
}
