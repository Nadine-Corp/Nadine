<?php

/**
 * La fonction get_diffuseur_societe() affiche le nom de société
 * des diffuseurs du projet demandé
 */

function get_diffuseur_societe($row)
{
  if (isset($row)) {
    if (isset($row["diffuseur__societe"])) {
      // Récupère les infos du diffuseur
      $diffuseur_societe = $row["diffuseur__societe"];

      // Retourne le résultat au template
      return $diffuseur_societe;
    }
  }
}


/**
 * La fonction the_diffuseur_societe() affiche le nom de société
 * des diffuseurs du projet demandé
 */

function the_diffuseur_societe($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    $diffuseur_societe = get_diffuseur_societe($row);

    // Retourne le résultat au template
    echo $diffuseur_societe;
  }
}
