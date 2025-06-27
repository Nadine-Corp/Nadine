<?php

/**
 * La fonction the_profil_ville() affiche
 * la ville de l'utilisateur
 */

function the_profil_ville($row)
{
  if (isset($row)) {
    if (isset($row["profil__ville"])) {
      // Récupère les infos du profil
      $profil__ville = $row['profil__ville'];

      // Retourne le résultat au template
      echo $profil__ville;
    }
  }
}
