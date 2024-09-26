<?php

/**
 * La fonction get_diffuseur_civilite() retourne
 * la civilité d'un difffuseur
 */

function get_diffuseur_civilite($row)
{
  if (isset($row)) {
    if (!empty($row['diffuseur__civilite'])) {
      // Récupère les infos du diffuseur
      $diffuseur_civilite = $row["diffuseur__civilite"];

      // Formate le résultat
      if (strpos($diffuseur_civilite, 'Mme') === 0) {
        $diffuseur_civilite = "Mme";
      }

      // Retourne le résultat au template
      return $diffuseur_civilite;
    }
  }
}
