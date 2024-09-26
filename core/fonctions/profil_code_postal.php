<?php

/**
 * La fonction the_profil_code_postal() affiche
 * le code postal de l'utilisateur
 */

function the_profil_code_postal($row)
{
  if (isset($row)) {
    if (isset($row["profil__code_postal"])) {
      // Récupère les infos du profil
      $profil__code_postal = $row['profil__code_postal'];

      // Formate le résultat
      $profil__code_postal = str_replace(' ', '', $profil__code_postal);

      // Retourne le résultat au template
      echo $profil__code_postal;
    }
  }
}
