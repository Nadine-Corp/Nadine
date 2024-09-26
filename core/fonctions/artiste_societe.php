<?php

/**
 * La fonction get_artiste_societe() retourne
 * le nom de société des artistes du projet demandé
 */

function get_artiste_societe($row)
{
  if (isset($row)) {
    if (isset($row["artiste__societe"])) {
      // Récupère les infos de l'artiste
      $artiste__societe = $row["artiste__societe"];

      // Retourne le résultat au template
      return $artiste__societe;
    }
  }
}


/**
 * La fonction the_artiste_societe() affiche
 * le nom de société des artistes du projet demandé
 */

function the_artiste_societe($row)
{
  if (isset($row)) {
    // Récupère les infos de l'artiste
    $artiste__societe = get_artiste_societe($row);

    // Retourne le résultat au template
    echo $artiste__societe;
  }
}
