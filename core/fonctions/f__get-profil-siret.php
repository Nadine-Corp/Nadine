<?php

/**
 * La fonction the_profil_siret() affiche
 * le nom de société de l'utilisateur
 */

function the_profil_siret($row)
{
  if (isset($row)) {
    if (isset($row["profil__siret"])) {
      // Récupère les infos du profil
      $profil__siret = $row['profil__siret'];

      // Retourne le résultat au template
      echo $profil__siret;
    }
  }
}
