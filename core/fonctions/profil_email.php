<?php

/**
 * La fonction the_profil_email() affiche
 * le courriel de l'utilisateur
 */

function the_profil_email($row)
{
  if (isset($row)) {
    if (!empty($row['profil__email'])) {
      // Récupère les infos du profil
      $profil__email = $row['profil__email'];

      // Retourne le résultat au template
      echo $profil__email;
    }
  }
}
