<?php

/**
 * La fonction the_profil_prenom() affiche
 * le prénom de l'utilisateur
 */

function the_profil_prenom($row)
{
  if (isset($row)) {
    if (isset($row["profil__prenom"])) {
      // Récupère les infos du profil
      $profil__prenom = $row['profil__prenom'];

      // Retourne le résultat au template
      echo $profil__prenom;
    }
  }
}
