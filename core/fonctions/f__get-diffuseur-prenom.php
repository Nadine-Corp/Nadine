<?php

/**
 * La fonction get_diffuseur_prenom() retourne
 * le prénom d'un difffuseur demandé
 */

function get_diffuseur_prenom($row)
{
  if (isset($row)) {
    if (isset($row["diffuseur__prenom"])) {
      // Récupère les infos du diffuseur
      $diffuseur_prenom = $row["diffuseur__prenom"];

      // Formate le résultat
      $diffuseur_prenom = ucwords(strtolower($diffuseur_prenom));

      // Retourne le résultat au template
      return $diffuseur_prenom;
    }
  }
}
