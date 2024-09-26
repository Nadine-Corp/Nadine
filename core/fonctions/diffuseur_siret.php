<?php

/**
 * La fonction get_diffuseur_siret() retourne
 * le SIRET d'un diffuseur
 */

function get_diffuseur_siret($row)
{
  if (isset($row)) {
    if (isset($row["diffuseur__siret"])) {
      // Récupère les infos du diffuseur
      $diffuseur_siret = $row["diffuseur__siret"];

      // Retourne le résultat au template
      return $diffuseur_siret;
    }
  }
}
