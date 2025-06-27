<?php

/**
 * La fonction the_profil_telephone() affiche
 * le numéros de téléphone de l'utilisateur
 */

function the_profil_telephone($row)
{
  if (isset($row)) {
    if (!empty($row['profil__telephone'])) {
      // Récupère les infos du profil
      $profil__telephone = $row['profil__telephone'];

      // Reset le format du numero de téléphone
      $phone_formated = $profil__telephone;
      $phone_formated = str_replace(' ', '', $phone_formated);
      $phone_formated = str_replace('.', '', $phone_formated);

      // Formate le titre du numero de téléphone
      $phone_title = chunk_split($phone_formated, 2, " ");

      // Retourne le résultat au template
      echo $phone_title;
    }
  }
}
