<?php

/**
 * La fonction get_diffuseur_nom() retourne
 * le nom d'un difffuseur demandé
 */

function get_diffuseur_nom($row)
{
  if (isset($row)) {
    if (!empty($row['diffuseur__nom'])) {
      // Récupère les infos du diffuseur
      $diffuseur_nom = $row["diffuseur__nom"];

      // Formate le résultat
      $diffuseur_nom = ucwords(strtolower($diffuseur_nom));

      // Retourne le résultat au template
      return $diffuseur_nom;
    }
  }
}


/**
 * La fonction the_diffuseur_nom() affiche
 * le nom d'un difffuseur demandé
 */

function the_diffuseur_nom($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    $diffuseur_nom = get_diffuseur_nom($row);

    // Retourne le résultat au template
    return $diffuseur_nom;
  }
}
