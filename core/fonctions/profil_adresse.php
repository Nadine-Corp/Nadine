<?php

/**
 * La fonction the_profil_adresse() affiche
 * l'adresse de l'utilisateur
 */

function the_profil_adresse($row)
{
  if (isset($row)) {
    if (isset($row["profil__adresse"])) {
      // Récupère les infos du profil
      $profil__adresse = $row['profil__adresse'];

      // Retourne le résultat au template
      echo $profil__adresse;
    }
  }
}
