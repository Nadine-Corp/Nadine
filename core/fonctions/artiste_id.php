<?php

/**
 * La fonction get_artiste_id() retourne
 * l'ID de l'artiste demandé
 */

function get_artiste_id($row)
{
  if (isset($row)) {
    if (isset($row["artiste__id"])) {
      // Récupère les infos de l'artiste
      $artiste__id = $row["artiste__id"];

      // Retourne le résultat au template
      return $artiste__id;
    }
  }
}
