<?php

/**
 * La fonction the_profil_numero_secu() affiche
 * le Numéro de sécurité sociale de l'utilisateur
 */

function the_profil_numero_secu($row)
{
  if (isset($row)) {
    if (isset($row["profil__numero_secu"])) {
      // Récupère les infos du profil
      $profil__numero_secu = $row['profil__numero_secu'];

      // Retourne le résultat au template
      echo $profil__numero_secu;
    }
  }
}
