<?php

/**
 * La fonction get_diffuseur_ville() retourne
 * le code postal des diffuseurs du projet demandé
 */

function get_diffuseur_ville($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    $diffuseur__ville = $row['diffuseur__ville'];

    // Retourne le résultat au template
    return $diffuseur__ville;
  }
}
