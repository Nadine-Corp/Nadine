<?php

/**
 * La fonction the_profil_societe() affiche
 * le nom de société de l'utilisateur
 */

function the_profil_societe($row)
{
  if (isset($row)) {
    if (isset($row["profil__societe"])) {
      // Récupère les infos du profil
      $profil__societe = $row['profil__societe'];

      // Retourne le résultat au template
      echo $profil__societe;
    }
  }
}
