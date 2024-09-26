<?php

/**
 * La fonction get_diffuseur_adresse() retourne
 * l'adresse des diffuseurs du projet demandé
 */

function get_diffuseur_adresse($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    $diffuseur__adresse = $row['diffuseur__adresse'];

    // Retourne le résultat au template
    return $diffuseur__adresse;
  }
}
