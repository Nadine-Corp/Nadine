<?php

/**
 * La fonction the_profil_pseudo() affiche
 * le pseudonyme de l'utilisateur
 */

function the_profil_pseudo($row)
{
  if (isset($row)) {
    if (isset($row['profil__pseudo'])) {
      // Récupère les infos du profil
      $profil__pseudo = $row['profil__pseudo'];

      // Retourne le résultat au template
      echo $profil__pseudo;
    }
  }
}
