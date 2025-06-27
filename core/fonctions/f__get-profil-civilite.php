<?php

/**
 * La fonction get_profil_civilite() permet de récupérer
 * la civilité de l'utilisateur
 */

function get_profil_civilite($row)
{
  if (isset($row)) {
    if (!empty($row['profil__civilite'])) {
      // Récupère les infos du diffuseur
      $profil__civilite = $row["profil__civilite"];

      // Formate le résultat
      if (strpos($profil__civilite, 'Mme') === 0) {
        $profil__civilite = "Mme";
      }

      // Retourne le résultat au template
      return $profil__civilite;
    }
  }
}
