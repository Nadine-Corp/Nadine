<?php

/**
 * La fonction the_profil_bic() affiche
 * le BIC du compte bancaire de l'utilisateur
 */

function the_profil_bic($row)
{
  if (isset($row)) {
    if (!empty($row['profil__bic'])) {
      // Récupère les infos du profil
      $profil__bic = $row['profil__bic'];

      // Retourne le résultat au template
      echo $profil__bic;
    }
  }
}
