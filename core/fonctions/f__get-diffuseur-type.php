<?php

/**
 * La fonction get_diffuseur_type() retourne
 * le type de diffuseur
 */

function get_diffuseur_type($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    if (isset($row["diffuseur__type"])) {
      $diffuseur__type = $row["diffuseur__type"];
    } else {
      $diffuseur__type = '';
    }

    // Retourne le résultat au template
    return $diffuseur__type;
  }
}


/**
 * La fonction the_diffuseur_type() afficher
 * le type de diffuseur
 */

function the_diffuseur_type($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseyr
    $diffuseur__type = get_diffuseur_type($row);

    // Retourne le résultat au template
    echo $diffuseur__type;
  }
}
