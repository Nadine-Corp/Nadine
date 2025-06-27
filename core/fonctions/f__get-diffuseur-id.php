<?php

/**
 * La fonction get_diffuseur_id() retourne
 * l'ID du diffuseur demandé
 */

function get_diffuseur_id($row)
{
  if (isset($row)) {
    if (isset($row["diffuseur__id"])) {
      // Retourne le résultat au template
      return $row["diffuseur__id"];
    }
  }
}


/**
 * La fonction the_diffuseur_id() affiche
 * l'ID du diffuseur demandé
 */

function the_diffuseur_id($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    $diffuseur_id = get_diffuseur_id($row);

    // Retourne le résultat au template
    echo $diffuseur_id;
  }
}
