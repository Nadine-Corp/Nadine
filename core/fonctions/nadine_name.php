<?php

/**
 * La fonction nadine_name() permet d'harmoniser
 * l'affichage des noms sur Nadine
 */

function nadine_name($civilite = '', $prenom = '', $nom = '')
{
  // Formate le prénom et le nom 
  if (!empty($prenom)) {
    $prenom = ucwords(strtolower($prenom));
  }
  if (!empty($nom)) {
    $nom = ucwords(strtolower($nom));
  }

  // Retourne le résultat au template
  return $civilite . ' ' . $prenom . ' ' . $nom;
}
