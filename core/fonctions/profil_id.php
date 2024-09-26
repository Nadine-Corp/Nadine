<?php

/**
 * La fonction get_profil_id() récupère
 * le numéros du profil utilisateur
 */

function get_profil_id($row)
{
  if (isset($row)) {
    // Récupère les infos du profil
    if (isset($row['profil__id'])) {
      $profil__id = $row['profil__id'];
    } else {
      $profil__id = get_profil_last_id();
    };

    // Retourne le résultat au template
    return $profil__id;
  }
}


/**
 * La fonction the_profil_id() affiche
 * le numéros du profil utilisateur
 */

function the_profil_id($row)
{
  if (isset($row)) {
    // Récupère les infos du profil
    $profil__id = get_profil_id($row);

    // Retourne le résultat au template
    echo $profil__id;
  }
}
