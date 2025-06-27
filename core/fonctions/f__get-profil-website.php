<?php

/**
 * La fonction the_profil_website() affiche
 * le site internet de l'utilisateur
 */

function the_profil_website($row)
{
  if (isset($row)) {
    if (!empty($row['profil__website'])) {
      // Récupère les infos du profil
      $profil__website = $row['profil__website'];

      // Retourne le résultat au template
      echo $profil__website;
    }
  }
}
