<?php

/**
 * La fonction the_profil_iban() affiche
 * l'IBAN du compte bancaire de l'utilisateur
 */

function the_profil_iban($row)
{
  if (isset($row)) {
    if (!empty($row['profil__iban'])) {
      // Récupère les infos du profil
      $profil__iban = $row['profil__iban'];

      // Retourne le résultat au template
      echo $profil__iban;
    }
  }
}
