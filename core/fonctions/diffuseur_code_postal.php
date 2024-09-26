<?php

/**
 * La fonction get_diffuseur_code_postal() affiche
 * le code postal
 * des diffuseurs du projet demandé
 */

function get_diffuseur_code_postal($row)
{
  if (isset($row)) {
    if ($row['diffuseur__code_postal']) {
      // Récupère les infos du diffuseur
      $diffuseur__code_postal = $row['diffuseur__code_postal'];

      // Formate le résultat
      $diffuseur__code_postal = str_replace(' ', '', $diffuseur__code_postal);

      // Retourne le résultat au template
      return $diffuseur__code_postal;
    }
  }
}
