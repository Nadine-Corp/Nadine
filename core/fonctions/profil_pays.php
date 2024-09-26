<?php

/**
 * La fonction the_profil_pays() affiche
 * le pays de l'utilisateur
 */

function the_profil_pays($row)
{
  if (isset($row)) {
    if (!empty($row['profil__pays'])) {
      $profil__pays = $row['profil__pays'];

      // Formate le résultat
      $profil__pays = ucwords(strtolower($profil__pays));

      // Retourne le résultat au template
      echo $profil__pays;
    }
  }
}
