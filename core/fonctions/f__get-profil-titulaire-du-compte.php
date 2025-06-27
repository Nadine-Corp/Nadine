<?php

/**
 * La fonction the_profil_titulaire_du_compte() affiche
 * le titulaire du compte bancaire de l'utilisateur
 */

function the_profil_titulaire_du_compte($row)
{
  if (isset($row)) {
    if (!empty($row['profil__titulaire_du_compte'])) {
      // Récupère les infos du profil
      $profil__titulaire_du_compte = $row['profil__titulaire_du_compte'];

      // Retourne le résultat au template
      echo $profil__titulaire_du_compte;
    }
  }
}
