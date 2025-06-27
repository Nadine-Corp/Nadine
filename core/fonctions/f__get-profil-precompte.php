<?php

/**
 * La fonction get_profil_precompte() permet de savoir
 * si l'utilisateur est dispensé de précompte ou pas
 */

function get_profil_precompte($row)
{
  if (isset($row)) {
    if (isset($row['profil__precompte'])) {
      // Récupère les infos du diffuseur
      $profil__precompte = $row["profil__precompte"];

      // Retourne le résultat au template
      return $profil__precompte;
    }
  }
}
