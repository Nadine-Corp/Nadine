<?php

/**
 * La fonction get_artiste_prenom() retourne
 * le prénom d'un artiste demandé
 */

function get_artiste_prenom($row)
{
  if (isset($row)) {
    if (isset($row["artiste__prenom"])) {
      // Récupère les infos de l'artiste
      $artiste_prenom = $row["artiste__prenom"];

      // Formate le résultat
      $artiste_prenom = ucwords(strtolower($artiste_prenom));

      // Retourne le résultat au template
      return $artiste_prenom;
    }
  }
}
