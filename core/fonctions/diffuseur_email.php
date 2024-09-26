<?php

/**
 * La fonction get_diffuseur_email() retourne
 * l'email des diffuseurs du projet demandé
 */

function get_diffuseur_email($row)
{
  if (isset($row)) {
    if (!empty($row['diffuseur__email'])) {
      // Récupère les infos du diffuseur
      $diffuseur__email = $row['diffuseur__email'];

      // Retourne le résultat au template
      return $diffuseur__email;
    }
  }
}


/**
 * La fonction the_diffuseur_email() affiche
 * l'email des diffuseurs du projet demandé
 */

function the_diffuseur_email($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    $diffuseur__email = get_diffuseur_email($row);

    // Formate le résultat
    $email = '<a href="mailto:' . $diffuseur__email . '" target="_blank">' . $diffuseur__email . '</a>';

    // Retourne le résultat au template
    echo $diffuseur__email;
  }
}
