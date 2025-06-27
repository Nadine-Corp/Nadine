<?php

/**
 * La fonction the_profil_nom() affiche
 * le prénom de l'utilisateur
 */

function the_profil_nom($row)
{
  if (isset($row)) {
    if (isset($row['profil__nom'])) {
      // Récupère les infos du profil
      $profil__nom = $row['profil__nom'];

      // Retourne le résultat au template
      echo $profil__nom;
    }
  }
}
