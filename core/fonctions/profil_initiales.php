<?php

/**
 * La fonction the_profil_initiales() affiche les initiales
 * de l'utilisateur. Ces initiales sont notament utilisé
 * dans la nomenclature des factures et devis
 */

function the_profil_initiales($row)
{
  if (isset($row)) {
    if (isset($row['profil__initiales'])) {
      // Récupère les infos du profil
      $profil__initiales = $row['profil__initiales'];

      // Retourne le résultat au template
      echo $profil__initiales;
    }
  }
}
