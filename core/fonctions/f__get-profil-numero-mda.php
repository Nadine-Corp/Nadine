<?php

/**
 * La fonction the_profil_numero_mda() affiche
 * le Numéro de Maison des Artistes de l'utilisateur
 */

function the_profil_numero_mda($row)
{
  if (isset($row)) {
    if (isset($row["profil__numero_mda"])) {
      // Récupère les infos du profil
      $profil__numero_mda = $row['profil__numero_mda'];

      // Retourne le résultat au template
      echo $profil__numero_mda;
    }
  }
}
