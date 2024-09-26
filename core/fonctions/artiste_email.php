<?php

/**
 * La fonction get_artiste_email() retourne
 * l'email des artistes du projet demandé
 */

function get_artiste_email($row)
{
  if (isset($row)) {
    if (!empty($row['artiste__email'])) {
      // Récupère les infos du artiste
      $artiste__email = $row['artiste__email'];

      // Retourne le résultat au template
      return $artiste__email;
    }
  }
}


/**
 * La fonction the_artiste_email() affiche
 * l'email des artistes du projet demandé
 */

function the_artiste_email($row)
{
  if (isset($row)) {
    // Récupère les infos du artiste
    $artiste__email = get_artiste_email($row);

    // Formate le résultat
    $artiste__email = '<a href="mailto:' . $artiste__email . '" target="_blank">' . $artiste__email . '</a>';

    // Retourne le résultat au template
    echo $artiste__email;
  }
}
